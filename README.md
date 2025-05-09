# Structure de l'application

## Admin
- **Mail**: Adresse email de l'administrateur.
- **Password**: Mot de passe de l'administrateur.

### Gestion des Causes
- **CRUD (Créer, Lire, Mettre à jour, Supprimer)** des causes.

### Dashboard
- **Causes passées**: Liste des causes déjà réalisées (option voir plus pour liste des donnateurs 
et ajout d'image ou de vidéo).
- **Causes à venir**: Cause ma plus imminente à venir.

## Causes
- **Titre**: Titre de la cause.
- **Description**: Description détaillée de la cause.
- **Image**: Image principale associée à la cause.
- **Montant**: Montant visé pour la cause.
- **Effectif**: Nombre de personnes impliquées ou ciblées.
- **Date de clôture des contributions**: Date limite pour les contributions à la cause.
- **Date de réalisation**: Date de lancement ou d'exécution de la cause.
- **Image (post réalisation)**: Image après la réalisation de la cause. (nullable)
- **Vidéos (post réalisation)**: Vidéos après la réalisation de la cause. (nullable)

## Volontaires (non implémenté)
- **Nom**: Nom du volontaire.
- **Prénom**: Prénom du volontaire.
- **Date de naissance**: Date de naissance du volontaire.
- **Lieu de naissance**: Lieu de naissance du volontaire.
- **Mail**: Adresse email du volontaire.
- **Password**: Mot de passe du volontaire.

## Don
- **Montant**: Montant du don effectué.
- **ID de la cause**: ID de la cause pour laquelle le don a été fait.
- **Mail du donateur**: Adresse email du donateur.
- **ID du volontaire**: ID du volontaire (nullable).

## Cause_Volontaire (non implémenté)
- **ID de la cause**: Référence à l'ID de la cause.
- **ID du volontaire**: Référence à l'ID du volontaire.

---

# Fonctionnalités

## Admin
- **Gestion des causes**:
    - Créer, modifier et supprimer des causes (CRUD).
    - Gestion des informations des causes : titre, description, images, montant, etc.

- **Dashboard**:
    - Visualisation des causes passées.
    - Visualisation des causes à venir.

## Volontaires (non implémenté)
- **Voir ses causes**:
    - Le volontaire peut consulter les causes où il a fait un don ou s'est inscrit pour du bénévolat.

- **Voir toutes les autres causes**:
    - Le volontaire peut également consulter toutes les causes disponibles.

- **Faire un don**:
    - Le volontaire peut effectuer un don à une cause en particulier.

## Visiteur
- **Faire un don**:
    - Les visiteurs peuvent faire un don sans avoir besoin de s'inscrire.

- **A propos**:
    - Section décrivant l'organisation et son fonctionnement.

- **Nos réalisations**:
    - Section présentant les causes et leurs résultats passés.

- **Causes à venir (don)**:
    - Liste des causes planifiées pour l'avenir.

- **Notre caisse de prévoyance**:
    - Une section dédiée à une cause de prévoyance, qui ne peut pas être supprimée (cause de base).
    - 
- **Nous contacter**:
    - Possibillté pour les visiteurs de laisser un mail à l'asso.
#   T h e - H o p e  
 