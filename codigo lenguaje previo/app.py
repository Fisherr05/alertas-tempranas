from flask import Flask, render_template, request, redirect, url_for, flash
from flask_mysqldb import MySQL
from datetime import date

# initializations
app = Flask(__name__)

# Mysql Connection
app.config['MYSQL_HOST'] = 'localhost' 
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'PLANTACION'
mysql = MySQL(app)

# settings
app.secret_key = "mysecretkey"

@app.route('/plantas')
def Plantas():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM PLANTA')
    data = cur.fetchall()
    cur.close()
    return render_template('plantas.html', plantas = data)

@app.route('/frutos')
def Frutos():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM FRUTO')
    data = cur.fetchall()
    cur.close()
    return render_template('frutos.html', frutos = data)

@app.route('/add_planta', methods=['POST'])
def add_planta():
    if request.method == 'POST':
        nombrePlanta = request.form['nombrePlanta']
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO PLANTA (nombrePlanta) VALUES (%s)", (nombrePlanta,))
        mysql.connection.commit()
        flash('¡Guardado con éxito!')
        return redirect(url_for('Plantas'))

@app.route('/edit_planta/<id>', methods=['POST', 'GET'])
def edit_planta(id):
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM PLANTA WHERE idPlanta =%s', (id))
    data = cur.fetchall()
    cur.close()
    print(data[0])
    return render_template('editPlanta.html', planta = data[0])

@app.route('/update_planta/<id>',methods=['POST'])
def update_planta(id):
    if request.method == 'POST':
        nombrePlanta = request.form['nombrePlanta']
        cur = mysql.connection.cursor()
        cur.execute("""
            UPDATE PLANTA
            SET nombrePlanta = %s
            WHERE idPlanta = %s
        """, (nombrePlanta, id))
        flash('¡Modificado con éxito!')
        mysql.connection.commit()
        return redirect(url_for('Plantas'))

@app.route('/delete_planta/<string:id>', methods = ['POST','GET'])
def delete_planta(id):  
    cur = mysql.connection.cursor()
    cur.execute('DELETE FROM PLANTA WHERE idPlanta = {0}'.format(id))
    mysql.connection.commit()
    flash('¡Eliminado con éxito!')
    return redirect(url_for('Plantas'))

@app.route('/add_fruto', methods=['POST'])
def add_fruto():
    if request.method == 'POST':
        nombreFruto = request.form['nombreFruto']
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO FRUTO (nombreFruto) VALUES (%s)",(nombreFruto,))
        mysql.connection.commit()
        flash('¡Guardado con éxito!')
        return redirect(url_for('Frutos'))

@app.route('/edit_fruto/<id>', methods = ['POST','GET'])
def edit_fruto(id):
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM FRUTO WHERE idFruto =%s', (id))
    data = cur.fetchall()
    cur.close()
    print(data[0])
    return render_template('editFruto.html', fruto = data[0])

@app.route('/update_fruto/<id>',methods=['POST'])
def update_fruto(id):
    if request.method == 'POST':
        nombreFruto = request.form['nombreFruto']
        cur = mysql.connection.cursor()
        cur.execute("""
            UPDATE FRUTO
            SET nombreFruto = %s
            WHERE idFruto = %s
        """, (nombreFruto, id))
        flash('¡Modificado con éxito!')
        mysql.connection.commit()
        return redirect(url_for('Frutos'))

@app.route('/delete_fruto/<string:id>', methods = ['POST','GET'])
def delete_fruto(id):
    cur = mysql.connection.cursor()
    cur.execute('DELETE FROM FRUTO WHERE idFruto = {0}'.format(id))
    mysql.connection.commit()
    flash('¡Eliminado con éxito!')
    return redirect(url_for('Frutos'))

@app.route('/pf')
def Pf():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM PF')
    data = cur.fetchall()
    cur.execute('SELECT * FROM PLANTA')
    data1 = cur.fetchall()
    cur.execute('SELECT * FROM FRUTO')
    data2 = cur.fetchall()
    cur.close()
    print(data)
    print(data1)
    print(data2)
    return render_template('pf.html', pfs = data, plantas = data1, frutos = data2)

@app.route('/app_pf')
def appPf():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM PLANTA')
    data1 = cur.fetchall()
    cur.execute('SELECT * FROM FRUTO')
    data2 = cur.fetchall()
    cur.close()
    return render_template('addPf.html', plantas = data1, frutos = data2)

@app.route('/add_pf', methods=['POST'])
def add_pf():
    if request.method == 'POST':
        idPlanta = request.form['idPlanta']
        idFruto = request.form['idFruto']
        today = date.today()
        dte =   today.strftime("%Y-%m-%d")
        fecha = dte
        incidencia = request.form['incidencia']
        severidad = request.form['severidad']
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO PF (idPlanta,idFruto,fecha,incidencia,severidad) VALUES (%s,%s,%s,%s,%s)",(idPlanta,idFruto,fecha,incidencia,severidad))
        mysql.connection.commit()
        flash('¡Guardado con éxito!')
        return redirect(url_for('Pf'))

@app.route('/edit_pf/<id1>&<id2>', methods = ['POST','GET'])
def edit_pf(id1,id2):
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM PF WHERE idPlanta =%s and idFruto=%s', (id1,id2))
    data = cur.fetchall()
    cur.execute('SELECT * FROM PLANTA WHERE idPlanta =%s',(id1))
    data1 = cur.fetchall()
    cur.execute('SELECT * FROM FRUTO WHERE idFruto=%s',(id2))
    data2 = cur.fetchall()
    cur.close()
    print(data)
    print(data1)
    print(data2)
    return render_template('editPf.html', pf = data[0], frutos=data2, plantas=data1)

@app.route('/update_pf/<id1>&<id2>',methods=['POST'])
def update_pf(id1,id2):
    if request.method == 'POST':
        idPlanta = request.form['idPlanta']
        idFruto = request.form['idFruto']
        incidencia = request.form['incidencia']
        severidad = request.form['severidad']
        today = date.today()
        dte =   today.strftime("%Y-%m-%d")
        fecha = dte
        cur = mysql.connection.cursor()
        cur.execute("""
            UPDATE PF
            SET idPlanta=%s,idFruto=%s, fecha=%s, incidencia = %s, severidad = %s
            WHERE idPlanta = %s and idFruto= %s
        """, (idPlanta,idFruto,fecha,incidencia,severidad,id1,id2))
        flash('¡Modificado con éxito!')
        mysql.connection.commit()
        return redirect(url_for('Pf'))

@app.route('/delete_pf/<id1>&<id2>', methods = ['POST','GET'])
def delete_pf(id1,id2):
    cur = mysql.connection.cursor()
    cur.execute('DELETE FROM PF WHERE idPlanta = %s AND idFruto = %s', (id1,id2))
    mysql.connection.commit()
    flash('¡Eliminado con éxito!')
    return redirect(url_for('Pf'))

@app.context_processor
def utility_processor():
    def obtenerFruto(frutos,id):
        for fruto in frutos:
            if fruto[0] == id:
                return fruto[1]
    return dict(obtenerFruto=obtenerFruto)

@app.context_processor
def utility_processor():
    def obtenerPlanta(plantas,id):
        for planta in plantas:
            if planta[0]== id:
                return planta[1]
    return dict(obtenerPlanta=obtenerPlanta)


if __name__ == '__main__':
    app.run(port=8090,debug =True)
