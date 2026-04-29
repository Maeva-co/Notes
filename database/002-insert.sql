-- ======================
-- SEMESTRES
-- ======================
INSERT INTO semestre (label) VALUES
('Semestre 3'),
('Semestre 4');

-- ======================
-- PARCOURS
-- ======================
INSERT INTO parcours (label, responsable) VALUES
('Bases de Données et Réseaux', 'Rakotomalala Vahatriniaina'),
('Web et Design', 'Rabenanahary Rojo'),
('Développement', 'Razafinjoleina Tahina');

-- ======================
-- UE (toutes les matières)
-- ======================
INSERT INTO ue (id, label, credits, semestre_id) VALUES

-- Semestre 3
('INF201', 'Programmation orientée objet', 6, 1),
('INF202', 'Bases de données objets', 6, 1),
('INF203', 'Programmation système', 4, 1),
('INF208', 'Réseaux informatiques', 6, 1),
('MTH201', 'Méthodes numériques', 4, 1),
('ORG201', 'Bases de gestion', 4, 1),

-- Semestre 4 (communes)
('INF204', 'Système d’information géographique', 6, 2),
('INF205', 'Système d’information', 6, 2),
('INF206', 'Interface Homme/Machine', 6, 2),
('INF207', 'Éléments d’algorithmique', 6, 2),
('INF209', 'Web dynamique', 6, 2),
('INF210', 'Mini-projet de développement', 10, 2),
('INF211', 'Mini-projet bases de données / réseaux', 10, 2),
('INF212', 'Mini-projet Web et design', 10, 2),

-- Maths
('MTH202', 'Analyse des données', 4, 2),
('MTH203', 'MAO', 4, 2),
('MTH204', 'Géométrie', 4, 2),
('MTH205', 'Équations différentielles', 4, 2),
('MTH206', 'Optimisation', 4, 2);

-- ======================
-- UE_PARCOURS
-- ======================

-- ===== Semestre 3 (tous parcours identiques) =====
INSERT INTO ue_parcours (ue_id, parcours_id, categorie, statuts) VALUES
('INF201', 1, 'INFO', 'obligatoire'),
('INF202', 1, 'INFO', 'obligatoire'),
('INF203', 1, 'INFO', 'obligatoire'),
('INF208', 1, 'INFO', 'obligatoire'),
('MTH201', 1, 'MATH', 'obligatoire'),
('ORG201', 1, 'GESTION', 'obligatoire'),

('INF201', 2, 'INFO', 'obligatoire'),
('INF202', 2, 'INFO', 'obligatoire'),
('INF203', 2, 'INFO', 'obligatoire'),
('INF208', 2, 'INFO', 'obligatoire'),
('MTH201', 2, 'MATH', 'obligatoire'),
('ORG201', 2, 'GESTION', 'obligatoire'),

('INF201', 3, 'INFO', 'obligatoire'),
('INF202', 3, 'INFO', 'obligatoire'),
('INF203', 3, 'INFO', 'obligatoire'),
('INF208', 3, 'INFO', 'obligatoire'),
('MTH201', 3, 'MATH', 'obligatoire'),
('ORG201', 3, 'GESTION', 'obligatoire');

-- ===== Semestre 4 =====

-- Parcours 1 : BDR
INSERT INTO ue_parcours VALUES
(NULL,'INF205',1,'INFO','obligatoire'),
(NULL,'INF206',1,'INFO','optionnel'),
(NULL,'INF207',1,'INFO','optionnel'),
(NULL,'INF211',1,'INFO','obligatoire'),
(NULL,'MTH202',1,'MATH','optionnel'),
(NULL,'MTH205',1,'MATH','optionnel'),
(NULL,'MTH206',1,'MATH','optionnel'),
(NULL,'MTH203',1,'MATH','obligatoire');

-- Parcours 2 : Web & Design
INSERT INTO ue_parcours VALUES
(NULL,'INF204',2,'INFO','optionnel'),
(NULL,'INF205',2,'INFO','optionnel'),
(NULL,'INF206',2,'INFO','optionnel'),
(NULL,'INF209',2,'INFO','obligatoire'),
(NULL,'INF212',2,'INFO','obligatoire'),
(NULL,'MTH202',2,'MATH','optionnel'),
(NULL,'MTH204',2,'MATH','optionnel'),
(NULL,'MTH206',2,'MATH','optionnel'),
(NULL,'MTH203',2,'MATH','obligatoire');

-- Parcours 3 : Développement
INSERT INTO ue_parcours VALUES
(NULL,'INF204',3,'INFO','optionnel'),
(NULL,'INF205',3,'INFO','optionnel'),
(NULL,'INF206',3,'INFO','optionnel'),
(NULL,'INF207',3,'INFO','obligatoire'),
(NULL,'INF210',3,'INFO','obligatoire'),
(NULL,'MTH204',3,'MATH','optionnel'),
(NULL,'MTH205',3,'MATH','optionnel'),
(NULL,'MTH206',3,'MATH','optionnel'),
(NULL,'MTH203',3,'MATH','obligatoire');

-- ======================
-- ETUDIANTS (5)
-- ======================
INSERT INTO etudiant (id, nom, prenom, promotion) VALUES
('ETU0001', 'Rakoto', 'Jean', 'L2'),
('ETU0002', 'Rabe', 'Maria', 'L2'),
('ETU0003', 'Andry', 'Paul', 'L2'),
('ETU0004', 'Noro', 'Lucie', 'L2'),
('ETU0005', 'Koto', 'Hery', 'L2');

-- ======================
-- UTILISATEURS
-- ======================
INSERT INTO utilisateur (username, password) VALUES
('admin', 'admin123');

INSERT INTO utilisateur (username, password) VALUES
('Hanaa', 'lol');