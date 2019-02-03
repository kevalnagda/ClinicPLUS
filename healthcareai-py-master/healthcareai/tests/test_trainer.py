import os
import sys
import unittest
from contextlib import contextmanager
from io import StringIO

from healthcareai.common.healthcareai_error import HealthcareAIError
from healthcareai.supervised_model_trainer import SupervisedModelTrainer
import healthcareai.tests.helpers as helpers
from healthcareai.trained_models.trained_supervised_model import TrainedSupervisedModel
import healthcareai.datasets as hcai_datasets


class TestSupervisedModelTrainer(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        df = hcai_datasets.load_diabetes()

        # Drop columns that won't help machine learning
        columns_to_remove = ['PatientID']
        df.drop(columns_to_remove, axis=1, inplace=True)

        cls.classification_trainer = SupervisedModelTrainer(dataframe=df,
                                                            predicted_column='ThirtyDayReadmitFLG',
                                                            model_type='classification',
                                                            impute=True,
                                                            grain_column='PatientEncounterID',
                                                            verbose=False)
        cls.regression_trainer = SupervisedModelTrainer(df,
                                                        'SystolicBPNBR',
                                                        'regression',
                                                        grain_column='PatientEncounterID',
                                                        impute=True,
                                                        verbose=False)

        cls.regression_trainer_impute_false = SupervisedModelTrainer(df,
                                                                     'SystolicBPNBR',
                                                                     'regression',
                                                                     grain_column='PatientEncounterID',
                                                                     impute=False,
                                                                     verbose=False)

    def test_knn(self):
        trained_knn = self.classification_trainer.knn()

        result = trained_knn.metrics
        self.assertIsInstance(trained_knn, TrainedSupervisedModel)

        helpers.assertBetween(self, 0.5, 0.95, result['roc_auc'])
        helpers.assertBetween(self, 0.79, 0.95, result['accuracy'])

    # TODO see if there is a way to make this test work in travisCI. It fails with this error:
    # TODO > _tkinter.TclError: no display name and no $DISPLAY environment variable
    @unittest.skipIf("SKIP_MSSQL_TESTS" in os.environ and os.environ["SKIP_MSSQL_TESTS"] == "true",
                     "Skipping this on Travis CI.")
    def test_random_forest_classification(self):
        # Force plot to save to prevent matplotlib blocking during testing
        trained_random_forest = self.classification_trainer.random_forest_classification(save_plot=True)
        result = trained_random_forest.metrics
        self.assertIsInstance(trained_random_forest, TrainedSupervisedModel)

        helpers.assertBetween(self, 0.65, 0.95, result['roc_auc'])
        helpers.assertBetween(self, 0.8, 0.95, result['accuracy'])

        # Clean up saved plot (see note above)
        try:
            os.remove('FeatureImportances.png')
        except OSError:
            pass

    def test_linear_regression(self):
        trained_linear_model = self.regression_trainer.linear_regression()
        self.assertIsInstance(trained_linear_model, TrainedSupervisedModel)

        result = trained_linear_model.metrics

        helpers.assertBetween(self, 450, 800, result['mean_squared_error'])
        helpers.assertBetween(self, 16, 29, result['mean_absolute_error'])

    def test_random_forest_regression(self):
        trained_rf_regressor = self.regression_trainer.random_forest_regression()
        self.assertIsInstance(trained_rf_regressor, TrainedSupervisedModel)

        result = trained_rf_regressor.metrics

        helpers.assertBetween(self, 350, 750, result['mean_squared_error'])
        helpers.assertBetween(self, 10, 25, result['mean_absolute_error'])

    def test_logistic_regression(self):
        trained_lr = self.classification_trainer.logistic_regression()
        self.assertIsInstance(trained_lr, TrainedSupervisedModel)

        result = trained_lr.metrics

        helpers.assertBetween(self, 0.52, 0.95, result['roc_auc'])
        helpers.assertBetween(self, 0.6, 0.95, result['accuracy'])

    def test_ensemble_classification(self):
        trained_ensemble = self.classification_trainer.ensemble()
        self.assertIsInstance(trained_ensemble, TrainedSupervisedModel)

        result = trained_ensemble.metrics

        helpers.assertBetween(self, 0.6, 0.97, result['roc_auc'])
        helpers.assertBetween(self, 0.6, 0.97, result['accuracy'])

    def test_ensemble_regression(self):
        self.assertRaises(HealthcareAIError, self.regression_trainer.ensemble)

    def test_linear_regression_raises_error_on_missing_columns(self):
        # TODO how is this working since the model does not use the training df???
        training_df = hcai_datasets.load_diabetes()

        # Drop columns that won't help machine learning
        training_df.drop(['PatientID'], axis=1, inplace=True)

        # Train the linear regression model
        trained_linear_model = self.regression_trainer.linear_regression()

        # Load a new df for predicting
        prediction_df = hcai_datasets.load_diabetes()

        # Drop columns that model expects
        prediction_df.drop('GenderFLG', axis=1, inplace=True)

        # Make some predictions
        self.assertRaises(HealthcareAIError, trained_linear_model.make_predictions, prediction_df)

    def test_linear_regression_raises_error_on_roc_plot(self):
        # Train the linear regression model
        trained_linear_model = self.regression_trainer.linear_regression()

        # Try the ROC plot
        self.assertRaises(HealthcareAIError, trained_linear_model.roc_plot)

    def test_impute_false_nan_data(self):
        # Train the linear regression model with impute = False
        trained_linear_model = self.regression_trainer_impute_false.linear_regression()

        # Load a new df for predicting
        prediction_df = hcai_datasets.load_diabetes()

        # Assert that the number of rows of prediction should be equal between df and model predictions
        self.assertEqual(len(trained_linear_model.make_predictions(prediction_df)), len(prediction_df))

@contextmanager
def captured_output():
    """
    A quick and dirty context manager that captures STDOUT and STDERR to enable testing of functions that print() things
    """
    new_out, new_err = StringIO(), StringIO()
    old_out, old_err = sys.stdout, sys.stderr
    try:
        sys.stdout, sys.stderr = new_out, new_err
        yield sys.stdout, sys.stderr
    finally:
        sys.stdout, sys.stderr = old_out, old_err


if __name__ == '__main__':
    unittest.main()
