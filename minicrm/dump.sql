-- TABLE clients
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    email VARCHAR(255),
    tel VARCHAR(50),
    statut VARCHAR(50),
    notes TEXT,
    created_at DATETIME,
    updated_at DATETIME
);

-- TABLE notes
CREATE TABLE IF NOT EXISTS client_notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    contenu TEXT,
    created_at DATETIME,
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

-- CLIENTS PAR DÉFAUT
INSERT INTO clients (nom, email, tel, statut, notes, created_at, updated_at) VALUES
('Société Alpha', 'contact@alpha.com', '0601020304', 'En discussion', 'Client intéressé par un site vitrine.', NOW(), NOW()),
('Martin Dupont', 'martin.dupont@example.com', '0655443322', 'Nouveau', 'Demande d\'informations envoyée ce matin.', NOW(), NOW()),
('Entreprise Nova', 'hello@nova.fr', '0788991122', 'Devis envoyé', 'Devis envoyé hier, en attente de réponse.', NOW(), NOW()),
('Julie Cohen', 'julie.cohen@gmail.com', '0677889922', 'Projet en cours', 'Développement en progression.', NOW(), NOW()),
('FoodExpress', 'info@foodexpress.fr', '0612345678', 'En pause', 'Projet mis en pause par le client.', NOW(), NOW()),
('Kevin Rossi', 'kevrossi@yahoo.fr', '0644557766', 'En attente', 'Client veut réfléchir avant de finaliser.', NOW(), NOW()),
('Agence Orion', 'pro@orion-agency.fr', '0766778899', 'Terminé', 'Projet finalisé et livré.', NOW(), NOW());

-- NOTES PAR DÉFAUT
INSERT INTO client_notes (client_id, contenu, created_at) VALUES
(1, 'Premier appel avec le commercial, bon feeling.', NOW()),
(1, 'Envoi de la plaquette commerciale.', NOW()),

(2, 'Réception du formulaire de contact.', NOW()),
(2, 'Mail envoyé pour prise de rendez-vous.', NOW()),

(3, 'Analyse du besoin réalisée.', NOW()),
(3, 'Devis PDF envoyé par email.', NOW()),

(4, 'Kick-off du projet effectué.', NOW()),
(4, 'Page d\'accueil validée par le client.', NOW()),

(5, 'Client souhaite suspendre le projet temporairement.', NOW()),

(6, 'Point téléphonique effectué, client hésitant.', NOW()),

(7, 'Livraison finale effectuée.', NOW()),
(7, 'Facture réglée par le client.', NOW());
