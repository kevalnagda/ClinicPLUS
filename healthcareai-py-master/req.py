import requests
import healthcareai
import json
url = 'http://localhost:5000/'
df = healthcareai.load_diabetes().to_json()
pred = [3,10001,170,191,4,'M']
pred = json.dumps(pred)
r = requests.post(url,json={'PatientEncounterID':1, 'PatientID':2, 'SystolicBPNBR':170, 'LDLNBR':140, 'A1CNBR':4.5, 'GenderFLG':'M'})
print(r.json())
