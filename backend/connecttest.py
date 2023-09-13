from tkinter import *
from tkinter import simpledialog
root = Tk()
import pandas as pd

from sklearn.model_selection import train_test_split as tts
from sklearn.ensemble import RandomForestClassifier,RandomForestRegressor


import wx
import sys

rainfall=pd.read_csv(r"maharashtra_rainfall.csv")
fer=pd.read_csv(r"proper_dataset.csv")
cropdb=pd.read_csv(r"crop_db.csv")
rainfall.dtypes
fer.dtypes

rainfall=rainfall.drop(['state'],axis=1)

rainfall_X = rainfall.drop(['rain'],axis=1)
rainfall_y = rainfall['rain']

fer_X=fer.drop(['fertility'],axis=1)
fer_y=fer['fertility']

rainfall_X=pd.get_dummies(rainfall_X)

X_rainfall_train, X_rainfall_test, y_rainfall_train, y_rainfall_test = tts(
    rainfall_X,
    rainfall_y,
    test_size=0.2)

X_fer_train, X_fer_test, y_fer_train, y_fer_test = tts(
    fer_X,
    fer_y,
    test_size=0.2)



def run_randomForests_classification(X_train,X_test,y_train,y_test,fertility_columns_test):
    rf=RandomForestClassifier(n_estimators=200,random_state=39,max_depth=4,oob_score=True)
    rf.fit(X_train,y_train)

    y_pred=rf.predict(X_train)

    y_score = rf.predict_proba(X_train)

    return(rf.predict(fertility_columns_test))

def run_randomForests_regression(X_train,X_test,y_train,y_test,rainfall_column_test):
    rf=RandomForestRegressor(n_estimators=200,random_state=39,max_depth=4)
    rf.fit(X_train,y_train)

    return(rf.predict(rainfall_column_test))


# cross validation


list_fertility_columns = []
N= simpledialog.askinteger("N","enter N")
list_fertility_columns.append(N)
P=simpledialog.askfloat("P","enter P")
list_fertility_columns.append(P)
K=simpledialog.askinteger("K","enter K")
list_fertility_columns.append(K)
ph=simpledialog.askfloat("ph","enter ph")
list_fertility_columns.append(ph)
ec=simpledialog.askfloat("ec","enter ec")
list_fertility_columns.append(ec)


fertility_columns_test = pd.DataFrame([list_fertility_columns], columns=['N', 'P', 'K', 'ph', 'ec'])


district=simpledialog.askstring("district","enter district")
year=simpledialog.askinteger("year","enter year")
month=simpledialog.askstring("month","enter month")



cols = rainfall_X.columns
cols = cols[1:]
rainfall_column_test = []
rainfall_column_test.append(year)
for i in cols:
    if i.split("_")[1] == month or i.split("_")[1] == district:
        rainfall_column_test.append(1)
    else:
        rainfall_column_test.append(0)

rainfall_column_test = pd.DataFrame([rainfall_column_test], columns=rainfall_X.columns)

# classification using random forest and then regression using randomforest
predicted_fertility = run_randomForests_classification(X_fer_train, X_fer_test, y_fer_train, y_fer_test,
                                                       fertility_columns_test)
predicted_rainfall = run_randomForests_regression(X_rainfall_train, X_rainfall_test, y_rainfall_train, y_rainfall_test,
                                                  rainfall_column_test)

crop1 = []
for i in range(0, len(cropdb)):
    if ((predicted_rainfall >= cropdb['min_rainfall'][i] and predicted_rainfall < cropdb['max_rainfall'][
        i]) and predicted_fertility == cropdb['fertility'][i]):
        #print(cropdb['crop'][i], "\n")
        cr = cropdb['crop'][i]
        if (len(crop1) == 0):
            crop1.insert(0, cr)
        else:
            crop1.append(cr)



class MainWindow(wx.Frame):
    def __init__(self, *args, **kwargs):
        wx.Frame.__init__(self, *args, **kwargs)
        self.panel = wx.Panel(self)

        self.list = wx.ListCtrl(self.panel, style=wx.LC_REPORT)
        self.list.InsertColumn(0, "Crop Names")

        for a in range(len(crop1)):
            self.list.Append([crop1[a]])

        self.sizer = wx.BoxSizer()
        self.sizer.Add(self.list, proportion=1, flag=wx.EXPAND)

        self.panel.SetSizerAndFit(self.sizer)
        self.Show()

        # Save
        # for row in range(self.list.GetItemCount()):
        # print(", ".join([self.list.GetItem(row, col).GetText() for col in range(self.list.GetColumnCount())]))


app1 = wx.App(False)
win = MainWindow(None)
app1.MainLoop()

