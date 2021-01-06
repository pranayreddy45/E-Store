print("Starting.........")
import pandas as pd
import numpy as np

data=pd.read_csv("results.csv", header=None)

data.isna().sum()

z=data.iloc[:,[0,1,2]]
z.duplicated().sum()
z[z.duplicated()].values

z.drop_duplicates(inplace=True)

z.iloc[:,2:3]=z.iloc[:,2:3].replace('0000-00-00',np.nan)

z.isna().sum()

from sklearn.impute import SimpleImputer
s=SimpleImputer(missing_values=np.nan, strategy='most_frequent')
z.iloc[:,2:3]=s.fit_transform(z.iloc[:,2:3])

x=z.sort_values([2,0], ascending=[False,True])

t=[]
s=[]
a=x.iloc[0,0]
date=x.iloc[0,2]
for i in range(0,len(x)):
    if(x.iloc[i,0]==a and x.iloc[i,2]==date):
        s.append(x.iloc[i,1])
    else:
        t.append(s)
        s=[]
        a=x.iloc[i,0]
        date=x.iloc[i,2]
        s.append(x.iloc[i,1])
t.append(s)
s=[]

support=round(4/len(t),2)
from apyori import apriori
rules=apriori(t, min_support=support, min_confidence=0.1, min_lift=1.1, max_length=2)
result=list(rules)    #Sorted By relavence(Combination of Support, Confidence, Lift)
r=str(result)
frozensets=r.split("RelationRecord")

# =============================================================================
# print(result[0][2][0])
# a=list(result[0][2][0])
# b=list(result[0][2])
# c=[]
# c.append(result[0][1])
# c.append(list(b[0][0]))
# c.append(list(b[0][1]))
# c.append(b[0][2])
# c.append(b[0][3])
# 
# if len(b)==2:
#     print("Hello")
# else:
#     print("Bue")
# =============================================================================

pred=[]
for i in range(0,len(result)):
    a=[]
    a.append(result[i][1])
    b=list(result[i][2])
    a.append(list(b[0][0]))
    a.append(list(b[0][1]))
    a.append(b[0][2])
    a.append(b[0][3])
    pred.append(a)
    if(len(b)==2):
        a=[]
        a.append(result[i][1])
        a.append(list(b[1][0]))
        a.append(list(b[1][1]))
        a.append(b[1][2])
        a.append(b[1][3])
    pred.append(a)


#Sorting according to Lift
# =============================================================================
#l=len(pred)
#for i in range(0,l):
#    for j in range(0,l-i-1):
#        if(pred[j][4]<pred[j+1][4]):
#            pred[j],pred[j+1]=pred[j+1],pred[j]
# =============================================================================
            
# =============================================================================
# file1=open("Prediction_list.txt","w")
# file1.write(pred)
# file1.close()
# =============================================================================

    
with open("Prediction_list.csv", "w") as outfile:
        for entries in pred:
            outfile.write(str(entries))
            outfile.write("\n")
            
            
            
print("Ending.....")
# =============================================================================
# with open("Pred_list", "w") as outfile:
#         for entries in pred:
#             if(type(entries)==list):
            
#                 for i in range(0,len(entries)):
#                     if(type(entries[i])==list):
#                         outfile.write(str(entries[i][0]))
#                     else:
#                         outfile.write(str(entries[i]))
#                 outfile.write('%d')
#             else:
#                 outfile.write(str(entries))
#             outfile.write("\n")
#             
# out = open('Prediction_lists.csv', 'w')
# for row in pred:
#     for column in row:
#         out.write(str(column))
#     out.write('\n')
# out.close()
# 
# 
# import csv
# with open('test.csv', 'wb') as f:
#     wtr = csv.writer(f, delimiter= ',')
#     wtr.writerows(pred)
# =============================================================================
    
