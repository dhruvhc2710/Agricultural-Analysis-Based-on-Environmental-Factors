import pandas as pd
import numpy as np

def kharif(rf):
	khar=rf['June']+rf['July']+rf['August']+rf['September']+rf['October']
	return khar
def wholeyear(rf):
	wy=rf.sum(axis=1)
	return wy
def tkharif(t):
	tk=(t['June']+t['July']+t['August']+t['September']+t['October'])/5
	return tk
tempnagpur=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Nagpur')
temppune=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Pune')
tempnashik=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Nashik')
tempaurangabad=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Aurangabad')
tempamravati=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Amravati')
tempsolapur=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Solapur')
tempyavatmal=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Yavatmal')
templatur=pd.read_excel(io='Data\Temperature_pandas.xlsx',sheet_name='Latur')

pressnagpur=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Nagpur')
presspune=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Pune')
pressnashik=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Nashik')
pressaurangabad=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Aurangabad')
pressamravati=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Amravati')
presssolapur=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Solapur')
pressyavatmal=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Yavatmal')
presslatur=pd.read_excel(io='Data\Pressure_pandas.xlsx',sheet_name='Latur')

rfnagpur=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Nagpur')
rfpune=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Pune')
rfnashik=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Nashik')
rfaurangabad=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Aurangabad')
rfamravati=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Amravati')
rfsolapur=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Solapur')
rfyavatmal=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Yavatmal')
rflatur=pd.read_excel(io='Data\Rainfall.xlsx',sheet_name='Latur')

kharnagpur=kharif(rfnagpur)
kharpune=kharif(rfpune)
kharnashik=kharif(rfnashik)
kharaurangabad=kharif(rfaurangabad)
kharamravati=kharif(rfamravati)
kharsolapur=kharif(rfsolapur)
kharyavatmal=kharif(rfyavatmal)
kharlatur=kharif(rflatur)

wynagpur=wholeyear(rfnagpur)
wypune=wholeyear(rfpune)
wynashik=wholeyear(rfnashik)
wyaurangabad=wholeyear(rfaurangabad)
wyamravati=wholeyear(rfamravati)
wysolapur=wholeyear(rfsolapur)
wyyavatmal=wholeyear(rfyavatmal)
wylatur=wholeyear(rflatur)

tknagpur=tkharif(tempnagpur)
tkpune=tkharif(temppune)
tknashik=tkharif(tempnashik)
tkaurangabad=tkharif(tempaurangabad)
tkamravati=tkharif(tempamravati)
tksolapur=tkharif(tempsolapur)
tkyavatmal=tkharif(tempyavatmal)
tklatur=tkharif(templatur)