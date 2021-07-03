import mysql.connector

mysql = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="PLANTACION"
)
cur = mysql.cursor()
cur.execute('SELECT * FROM FRUTO')
data = cur.fetchall()

for x in data:
  print(x[0])