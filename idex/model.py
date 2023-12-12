import mysql.connector
import pandas as pd
from sklearn.preprocessing import LabelEncoder, StandardScaler
from sklearn.model_selection import train_test_split
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense

# Підключення до бази даних PHPMyAdmin
user = 'root'
password = 'root'
host = 'localhost'
database = 'register'

connection = mysql.connector.connect(user=user, password=password, host=host, database=database)

query = "SELECT title, description FROM songs"
data = pd.read_sql_query(query, connection)

data = data.dropna()

# Закриваємо з'єднання з базою даних
connection.close()

# Обробка та навчання моделі
label_encoder = LabelEncoder()
data['description'] = label_encoder.fit_transform(data['description'])
data['title'] = label_encoder.fit_transform(data['title'])

X = data[['description']]
Y = data['title']

if X.shape[0] > 0:
    # Розділення на тренувальний та тестовий набори
    X_train, X_test, Y_train, Y_test = train_test_split(X, Y, test_size=0.2, random_state=42)

    scaler = StandardScaler()
    X_train_scaled = scaler.fit_transform(X_train)
    X_test_scaled = scaler.transform(X_test)

    model = Sequential()
    model.add(Dense(64, input_dim=X_train_scaled.shape[1], activation='relu'))
    model.add(Dense(32, activation='relu'))
    model.add(Dense(1, activation='linear'))

    model.compile(loss='mean_squared_error', optimizer='adam', metrics=['mae'])

    # Навчання моделі
    model.fit(X_train_scaled, Y_train, epochs=38, batch_size=32, validation_data=(X_test_scaled, Y_test))

    # Збереження моделі
    model.save('music_model.h5')

    # Використання моделі для передбачення
    # Наприклад, для передбачення для певного імені автора (наприклад, 0 - це перший автор у LabelEncoder)
    description_to_predict = [[0]]
    description_to_predict_scaled = scaler.transform(description_to_predict)
    predicted_songs = model.predict(description_to_predict_scaled)
    print(f'Пісні, передбачені за іменем автора: {predicted_songs}')
else:
    print("Немає достатньої кількості зразків для навчання моделі.")

