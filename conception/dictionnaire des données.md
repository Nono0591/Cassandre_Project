# Base de Données - Structure des Tables

## Tables Principales

### Client

| Donnée         | Description                             | Type     | Taille | Contraintes  |
|----------------|-----------------------------------------|----------|--------|--------------|
| Id_client      | Identifiant du client                   | COUNTER  | —      | Clé primaire |
| type_client    | Type de client (particulier/entreprise) | VARCHAR  | 50     | Obligatoire  |
| raison_sociale | Raison sociale du client                | VARCHAR  | 50     | Optionnel    |
| nom            | Nom du client                           | VARCHAR  | 50     | Obligatoire  |
| email          | Adresse email du client                 | VARCHAR  | 50     | Unique       |
| telephone      | Numéro de téléphone                     | VARCHAR  | 50     | —            |
| adress         | Adresse du client                       | VARCHAR  | 50     | —            |

### Rôle

| Donnée        | Description               | Type     | Taille | Contraintes  |
|---------------|---------------------------|----------|--------|--------------|
| Id_role       | Identifiant du rôle       | COUNTER  | —      | Clé primaire |
| fonction_role | Fonction associée au rôle | VARCHAR  | 50     | Obligatoire  |

### Candidat

| Donnée             | Description             | Type     | Taille | Contraintes  |
|--------------------|-------------------------|----------|--------|--------------|
| Id_candidat        | Identifiant du candidat | COUNTER  | —      | Clé primaire |
| nom                | Nom du candidat         | VARCHAR  | 50     | Obligatoire  |
| prénom             | Prénom du candidat      | VARCHAR  | 50     | Obligatoire  |
| email              | Email du candidat       | VARCHAR  | 50     | Unique       |
| téléphone          | Téléphone du candidat   | VARCHAR  | 50     | —            |
| date_d_inscription | Date d'inscription      | DATE     | —      | Obligatoire  |

### Session de Certification

| Donnée                      | Description               | Type     | Taille | Contraintes  |
|-----------------------------|---------------------------|----------|--------|--------------|
| Id_session_de_certification | Identifiant de la session | COUNTER  | —      | Clé primaire |
| date_debut                  | Date de début de session  | VARCHAR  | 50     | Obligatoire  |
| date_de_fin                 | Date de fin de session    | VARCHAR  | 50     | Obligatoire  |
| statut                      | Statut de la session      | VARCHAR  | 50     | —            |
| lieu                        | Lieu de la session        | VARCHAR  | 50     | —            |

### Abonnement

| Donnée        | Description                 | Type     | Taille | Contraintes  |
|---------------|-----------------------------|----------|--------|--------------|
| Id_abonnement | Identifiant de l'abonnement | COUNTER  | —      | Clé primaire |
| date_de_debut | Date de début               | DATE     | —      | Obligatoire  |
| date_de_fin   | Date de fin                 | DATE     | —      | Obligatoire  |
| prix          | Prix de l'abonnement        | CURRENCY | —      | —            |
| statut        | Statut de l'abonnement      | VARCHAR  | 50     | —            |

### Audit

| Donnée              | Description             | Type     | Taille | Contraintes   |
|---------------------|-------------------------|----------|--------|---------------|
| Id_audit            | Identifiant de l'audit  | COUNTER  | —      | Clé primaire  |
| date_d_intervention | Date de l'intervention  | DATE     | —      | —             |
| statut              | Statut de l'audit       | VARCHAR  | 50     | —             |
| reference_mission   | Référence de la mission | VARCHAR  | 50     | Unique        |
| perimetre_declaré   | Périmètre déclaré       | VARCHAR  | 50     | —             |
| rapport             | Rapport d'audit         | VARCHAR  | 50     | —             |
| durée               | Durée de l'audit        | VARCHAR  | 50     | —             |
| Id_client           | Client concerné         | COUNTER  | —      | Clé étrangère |

### Certification

| Donnée                      | Description                  | Type     | Taille | Contraintes   |
|-----------------------------|------------------------------|----------|--------|---------------|
| Id_certification            | Identifiant de certification | COUNTER  | —      | Clé primaire  |
| nom_certification           | Nom de la certification      | VARCHAR  | 50     | Obligatoire   |
| domaine                     | Domaine de la certification  | VARCHAR  | 50     | —             |
| niveau                      | Niveau de la certification   | VARCHAR  | 50     | —             |
| durée_de_validité           | Durée de validité            | DATE     | —      | —             |
| Id_session_de_certification | Session associée             | COUNTER  | —      | Clé étrangère |

### User

| Donnée          | Description         | Type     | Taille | Contraintes   |
|-----------------|---------------------|----------|--------|---------------|
| Id_salarié_     | Identifiant salarié | COUNTER  | —      | Clé primaire  |
| nom             | Nom                 | VARCHAR  | 50     | Obligatoire   |
| prenom          | Prénom              | VARCHAR  | 50     | Obligatoire   |
| email           | Email               | VARCHAR  | 50     | Unique        |
| statut          | Statut              | VARCHAR  | 50     | —             |
| date_d_embauche | Date d'embauche     | VARCHAR  | 50     | —             |
| password        | Mot de passe        | VARCHAR  | 50     | Obligatoire   |
| Id_role         | Rôle associé        | COUNTER  | —      | Clé étrangère |

### Ressources Pédagogiques

| Donnée                    | Description           | Type     | Taille | Contraintes   |
|---------------------------|-----------------------|----------|--------|---------------|
| Id_ressources_pédagogique | Identifiant ressource | COUNTER  | —      | Clé primaire  |
| titre                     | Titre de la ressource | VARCHAR  | 50     | Obligatoire   |
| type_ressource            | Type de ressource     | VARCHAR  | 50     | —             |
| date_de_publication       | Date de publication   | VARCHAR  | 50     | —             |
| Id_salarié_               | Auteur                | COUNTER  | —      | Clé étrangère |

### Facture

| Donnée            | Description          | Type     | Taille | Contraintes   |
|-------------------|----------------------|----------|--------|---------------|
| Id_facture        | Identifiant facture  | COUNTER  | —      | Clé primaire  |
| numéro_de_facture | Numéro de facture    | VARCHAR  | 50     | Unique        |
| date_             | Date de facturation  | DATE     | —      | —             |
| montant           | Montant total        | CURRENCY | —      | —             |
| statut            | Statut de la facture | VARCHAR  | 50     | —             |
| mode_de_paiement  | Mode de paiement     | VARCHAR  | 50     | —             |
| Id_salarié_       | Salarié émetteur     | COUNTER  | —      | Clé étrangère |
| Id_audit          | Audit associé        | COUNTER  | —      | Clé étrangère |

### Ligne de Facture

| Donnée           | Description       | Type     | Taille | Contraintes   |
|------------------|-------------------|----------|--------|---------------|
| Id_ligne_facture | Identifiant ligne | COUNTER  | —      | Clé primaire  |
| libelle          | Libellé           | VARCHAR  | 50     | —             |
| quantité         | Quantité          | INT      | —      | —             |
| prixUnitaireHT   | Prix unitaire HT  | DECIMAL  | 15,2   | —             |
| tauxTVA          | Taux de TVA       | DECIMAL  | 15,2   | —             |
| totalLigneTTC    | Total TTC         | DECIMAL  | 15,2   | —             |
| Id_facture       | Facture associée  | COUNTER  | —      | Clé étrangère |

---

## Tables d'Association

### Supervise

| Donnée                      | Description         | Contraintes                 |
|-----------------------------|---------------------|-----------------------------|
| Id_salarié_                 | Salarié superviseur | Clé étrangère, clé primaire |
| Id_session_de_certification | Session supervisée  | Clé étrangère, clé primaire |

### Intervient

| Donnée      | Description         | Contraintes                 |
|-------------|---------------------|-----------------------------|
| Id_audit    | Audit               | Clé étrangère, clé primaire |
| Id_salarié_ | Salarié intervenant | Clé étrangère, clé primaire |

### Abonne

| Donnée        | Description | Contraintes                 |
|---------------|-------------|-----------------------------|
| Id_abonnement | Abonnement  | Clé étrangère, clé primaire |
| Id_candidat   | Candidat    | Clé étrangère, clé primaire |

### Donne Accès

| Donnée                    | Description | Contraintes                 |
|---------------------------|-------------|-----------------------------|
| Id_ressources_pédagogique | Ressource   | Clé étrangère, clé primaire |
| Id_abonnement             | Abonnement  | Clé étrangère, clé primaire |

### S'inscrit

| Donnée                      | Description     | Type     | Taille | Contraintes                 |
|-----------------------------|-----------------|----------|--------|-----------------------------|
| Id_candidat                 | Candidat        | COUNTER  | —      | Clé étrangère, clé primaire |
| Id_session_de_certification | Session         | COUNTER  | —      | Clé étrangère, clé primaire |
| resultat                    | Résultat obtenu | VARCHAR  | 50     | —                           |