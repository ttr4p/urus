
from flask import Flask, render_template, request, redirect, session, url_for
import pymysql
import os

app = Flask(__name__)
app.secret_key = 'secreto123'  # Em produção, use um segredo mais seguro

# Configurações do banco com variáveis definidas no Railway
db_config = {
    'host': 'mysql.railway.internal',
    'user': 'root',
    'password': 'YEWxrQLjwcJdTssEjnNUpSMYZMFhjSdk',
    'database': 'railway'
}

def get_db_connection():
    return pymysql.connect(**db_config)

@app.route('/', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        con = get_db_connection()
        with con:
            with con.cursor() as cursor:
                cursor.execute("SELECT * FROM usuarios WHERE username=%s AND password=%s", (username, password))
                user = cursor.fetchone()
                if user:
                    session['user'] = username
                    return redirect(url_for('menu'))
        return render_template('login.html', error="Credenciais inválidas")
    return render_template('login.html')

@app.route('/menu')
def menu():
    if 'user' not in session:
        return redirect(url_for('login'))
    return render_template('menu.html')

@app.route('/estoque')
def estoque():
    if 'user' not in session:
        return redirect(url_for('login'))
    con = get_db_connection()
    with con:
        with con.cursor() as cursor:
            cursor.execute("SELECT * FROM estoque")
            itens = cursor.fetchall()
    return render_template('estoque.html', itens=itens)

@app.route('/logout')
def logout():
    session.clear()
    return redirect(url_for('login'))

if __name__ == '__main__':
    app.run(debug=True)
