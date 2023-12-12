from flask import Flask, request, jsonify
import mysql.connector
import pandas as pd
from sklearn.preprocessing import LabelEncoder, StandardScaler
from tensorflow.keras.models import load_model
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

def after_request(response):
    response.headers.add('Access-Control-Allow-Origin', 'http://localhost:501')

    response.headers.add('Access-Control-Allow-Headers', 'Content-Type,Authorization')
    response.headers.add('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS')
    return response

app.after_request(after_request)

model = load_model('./music_model.h5')

db_params = {
    'user': 'root',
    'password': 'root',
    'host': 'localhost',
    'database': 'register'
}


@app.route('/music', methods=['POST'])
def music():
    data = request.get_json()

    connection = mysql.connector.connect(**db_params)
    query = "SELECT title, description FROM songs WHERE description = %s"
    songs_data = pd.read_sql_query(query, connection, params=(data['description'],))
    connection.close()

    label_encoder = LabelEncoder()
    songs_data['description'] = label_encoder.fit_transform(songs_data['description'])

    X = songs_data[['description']]
    Y = songs_data['title']

    scaler = StandardScaler()
    X_scaled = scaler.fit_transform(X)

    music = model.predict(X_scaled)

    # Сортування за передбаченими значеннями
    songs_data['predicted_values'] = music
    songs_data = songs_data.sort_values(by='predicted_values', ascending=False)

    # Використовуйте inverse_transform для отримання текстових значень 'description'
    songs_data['description'] = label_encoder.inverse_transform(songs_data['description'])

    # Всі пісні
    all_songs_list = songs_data[['title', 'description']].to_dict(orient='records')

    response_data = {
        'success': True,
        'all_songs': all_songs_list
    }

    return jsonify(response_data)


if __name__ == '__main__':
    app.run(port=5001)


