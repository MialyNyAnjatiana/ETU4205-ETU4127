-- sqlite3 mobile-money.db
CREATE TABLE prefixe (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    valeur VARCHAR(3) NOT NULL
);


CREATE TABLE utilisateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR,
    num_tel VARCHAR(10) NOT NULL,
    role VARCHAR NOT NULL DEFAULT 'client' CHECK(role IN ('client', 'administrateur')),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE solde (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_utilisateur INTEGER NOT NULL,
    montant_dispo DECIMAL NOT NULL,
    date_maj DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE type_operation (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR NOT NULL
);

CREATE TABLE frais (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    valeur_min DECIMAL NOT NULL,
    valeur_max DECIMAL NOT NULL,
    montant_frais DECIMAL NOT NULL
);

CREATE TABLE historique (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_utilisateur INTEGER NOT NULL,
    montant DECIMAL NOT NULL,
    id_type_operation INTEGER NOT NULL,
    date_historique DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (id_type_operation) REFERENCES type_operation(id) ON DELETE CASCADE
    
);