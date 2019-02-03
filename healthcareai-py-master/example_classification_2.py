"""Creates and compares classification models using sample clinical data.

Please use this example to learn about healthcareai before moving on to the next example.

If you have not installed healthcare.ai, refer to the instructions here:
  http://healthcareai-py.readthedocs.io

To run this example:
  python3 example_classification_2.py

This code uses the diabetes sample data in datasets/data/diabetes.csv.
"""
import pandas as pd
import numpy as np
import sqlalchemy

import healthcareai
import healthcareai.common.database_connections as hcai_db


def main():
    """Template script for using healthcareai predict using a trained classification model."""
    # Load the included diabetes sample data
    prediction_dataframe = healthcareai.load_diabetes()
    
    
    # uncomment below code if advance imputaion is used in example_classification_1 
    # beacuse we have intentionally converted GenderFLG column into numeric type for demonstration of numeric_columns_as_categorical feature.
    """
    prediction_dataframe['GenderFLG'].iloc[ 500:530, ] = np.NaN
    prediction_dataframe['GenderFLG'].replace( to_replace=[ 'M', 'F' ], value=[ 0, 1], inplace=True )
    """

    # ...or load your own data from a .csv file: Uncomment to pull data from your CSV
    # prediction_dataframe = healthcareai.load_csv('path/to/your.csv')

    # ...or load data from a MSSQL server: Uncomment to pull data from MSSQL server
    # server = 'localhost'
    # database = 'SAM'
    # query = """SELECT *
    #             FROM [SAM].[dbo].[DiabetesClincialSampleData]
    #             WHERE ThirtyDayReadmitFLG is null"""
    #
    # engine = hcai_db.build_mssql_engine_using_trusted_connections(server=server, database=database)
    # prediction_dataframe = pd.read_sql(query, engine)

    # Peek at the first 5 rows of data
    print(prediction_dataframe.head(5))

    # Load the saved model using your filename.
    # File names are timestamped and look like '2017-05-31T12-36-21_classification_RandomForestClassifier.pkl')
    # Note the file you saved in example_classification_1.py and set that here.
    trained_model = healthcareai.load_saved_model('2019-02-01T22-09-14_classification_RandomForestClassifier.pkl')
    #trained_model = healthcareai.load_saved_model('2018-10-09T13-25-28_classification_RandomForestClassifier_advanceImputation.pkl')

    # Any saved model can be inspected for properties such as plots, metrics, columns, etc. (More examples in the docs)
    trained_model.roc_plot()
    print(trained_model.roc())
    # print(trained_model.column_names)
    # print(trained_model.grain_column)
    # print(trained_model.prediction_column)

    # # Make predictions. Please note that there are four different formats you can choose from. All are shown
    #    here, though you only need one.

    # ## Get predictions
    predictions = trained_model.make_predictions(prediction_dataframe)
    print('\n\n-------------------[ Predictions ]----------------------------------------------------\n')
    print(predictions.head())

    # ## Get the important factors
    factors = trained_model.make_factors(prediction_dataframe, number_top_features=3)
    print('\n\n-------------------[ Factors ]----------------------------------------------------\n')
    print(factors.head())

    # ## Get predictions with factors
    predictions_with_factors_df = trained_model.make_predictions_with_k_factors(prediction_dataframe,
                                                                                number_top_features=3)
    print('\n\n-------------------[ Predictions + factors ]----------------------------------------------------\n')
    print(predictions_with_factors_df.head())

    # ## Get original dataframe with predictions and factors
    original_plus_predictions_and_factors = trained_model.make_original_with_predictions_and_factors(
        prediction_dataframe, number_top_features=3)
    print('\n\n-------------------[ Original + predictions + factors ]-------------------------------------------\n')
    print(original_plus_predictions_and_factors.head())

    # Save your predictions. You can save predictions to a csv or database. Examples are shown below.
    # Please note that you will likely only need one of these output types. Feel free to delete the others.

    # Save results to csv
    predictions_with_factors_df.to_csv('ClinicalPredictions.csv')

    # ## MSSQL using Trusted Connections
    # server = 'localhost'
    # database = 'my_database'
    # table = 'predictions_output'
    # schema = 'dbo'
    # engine = hcai_db.build_mssql_engine_using_trusted_connections(server, database)
    # predictions_with_factors_df.to_sql(table, engine, schema=schema, if_exists='append', index=False)

    # ## MySQL using standard authentication
    # server = 'localhost'
    # database = 'my_database'
    # userid = 'fake_user'
    # password = 'fake_password'
    # table = 'prediction_output'
    # mysql_connection_string = 'Server={};Database={};Uid={};Pwd={};'.format(server, database, userid, password)
    # mysql_engine = sqlalchemy.create_engine(mysql_connection_string)
    # predictions_with_factors_df.to_sql(table, mysql_engine, if_exists='append', index=False)

    # ## SQLite
    # path_to_database_file = 'database.db'
    # table = 'prediction_output'
    # trained_model.predict_to_sqlite(prediction_dataframe, path_to_database_file, table, trained_model.make_factors)

    # ## Health Catalyst EDW specific instructions. Uncomment to use.
    # This output is a Health Catalyst EDW specific dataframe that includes grain column, the prediction and factors
    # catalyst_dataframe = trained_model.create_catalyst_dataframe(prediction_dataframe)
    # print('\n\n-------------------[ Catalyst SAM ]----------------------------------------------------\n')
    # print(catalyst_dataframe.head())
    # server = 'localhost'
    # database = 'SAM'
    # table = 'HCAIPredictionClassificationBASE'
    # schema = 'dbo'
    # trained_model.predict_to_catalyst_sam(prediction_dataframe, server, database, table, schema)


if __name__ == "__main__":
    main()
