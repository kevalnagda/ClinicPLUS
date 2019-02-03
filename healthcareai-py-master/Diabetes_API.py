from flask import Flask,request, jsonify
import pandas as pd
import numpy as np
import sqlalchemy
from sqlalchemy import text
import healthcareai
import healthcareai.trained_models.trained_supervised_model as tsm_plots
import healthcareai.common.database_connections as hcai_db

app = Flask(__name__)


@app.route("/",methods=['POST'])
def api():

	server = 'localhost'
	database = 'clinicplus'
	query = """SELECT *
	        FROM clinicplus.diabetes
	        -- In this step, just grab rows that have a target
	        WHERE Prediction is not null ORDER BY PatientID DESC LIMIT 1"""

	engine = sqlalchemy.create_engine('mysql://root:@localhost/clinicplus')
	# sql = text('SELECT * FROM clinicplus.diabetes WHERE Prediction is not null ORDER BY PatientID DESC LIMIT 1');
	# result = engine.execute(sql)
	prediction_dataframe = pd.read_sql_query(query,engine)

	# prediction_dataframe = request.get_json()
	# print(prediction_dataframe)
	# from pandas.io.json import json_normalize

	# prediction_dataframe = json_normalize(prediction_dataframe)
	# prediction_dataframe = pd.DataFrame.from_dict(prediction_dataframe)

	# prediction_dataframe = prediction_dataframe[['PatientEncounterID', 'PatientID', 'SystolicBPNBR', 'LDLNBR', 'A1CNBR', 'GenderFLG']]
	# def drop_col_n(df, col_n_to_drop):
	#     col_dict = {x: col for x, col in enumerate(df.columns)}
	#     return df.drop(col_dict[col_n_to_drop], 1)
	# prediction_dataframe = drop_col_n(prediction_dataframe, 0)

	# prediction_dataframe.reset_index(drop=True,inplace=True)
	# prediction_dataframe =  pd.read_json(prediction_dataframe)
	
	print(prediction_dataframe)
	trained_model = healthcareai.load_saved_model('2019-02-02T13-34-41_classification_RandomForestClassifier.pkl')
	predictions = trained_model.make_predictions(prediction_dataframe[['PatientEncounterID', 'PatientID', 'SystolicBPNBR', 'LDLNBR', 'A1CNBR', 'GenderFLG']])
	print('\n\n-------------------[ Predictions ]----------------------------------------------------\n')
	print(predictions)

	# ## Get the important factors
	factors = trained_model.make_factors(prediction_dataframe, number_top_features=0)
	print('\n\n-------------------[ Factors ]----------------------------------------------------\n')
	print(factors.head())

	# ## Get predictions with factors
	predictions_with_factors_df = trained_model.make_predictions_with_k_factors(prediction_dataframe,
	                                                                            number_top_features=0)
	print('\n\n-------------------[ Predictions + factors ]----------------------------------------------------\n')
	print(predictions_with_factors_df.head())

	# ## Get original dataframe with predictions and factors
	original_plus_predictions_and_factors = trained_model.make_original_with_predictions_and_factors(
	    prediction_dataframe, number_top_features=0)
	print('\n\n-------------------[ Original + predictions + factors ]-------------------------------------------\n')
	print(original_plus_predictions_and_factors.head())

	## MySQL using standard authentication
	server = 'localhost'
	database = 'clinicplus'
	userid = 'root'
	password = ''
	table = 'diabetes'
	mysql_connection_string = 'Server={};Database={};Uid={};Pwd={};'.format(server, database, userid, password)

	mysql_engine = sqlalchemy.create_engine('mysql://root:@localhost/clinicplus')
	original_plus_predictions_and_factors.to_sql(table, mysql_engine, if_exists='append', index=False)
	del original_plus_predictions_and_factors

	return ''

if __name__ == '__main__':
    app.run(debug=True)