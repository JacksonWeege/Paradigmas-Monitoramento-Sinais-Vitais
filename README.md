Integrantes: Jackson F. Weege e Luís Fernando de Souza

Banco:
CREATE TABLE paciente (
    id serial PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INTEGER,
    sexo VARCHAR(10),
    cidade VARCHAR(100)
);

CREATE TABLE sinais_vitais (
    id serial PRIMARY KEY,
    paciente_id INTEGER REFERENCES paciente(id),
    pulso INTEGER,
    frequencia_cardiaca INTEGER,
    pressao_arterial_alta INTEGER,
    pressao_arterial_baixa INTEGER,
    temperatura NUMERIC(5,2)
);
