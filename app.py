from flask import Flask, render_template, request, redirect, url_for, flash
from flask_mysqldb import MySQL

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
    cur.execute('DELETE FROM PLANTA WHERE id = {0}'.format(id))
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
    cur.execute('DELETE FROM FRUTO WHERE id = {0}'.format(id))
    mysql.connection.commit()
    flash('¡Eliminado con éxito!')
    return redirect(url_for('Frutos'))

if __name__ == '__main__':
    app.run(port=8090,debug =True)
