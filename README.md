### Points à corriger : 
   
 - le job cleanExpiredSessions affiche done mais ne maque pas les sessions comme terminées  
 - les Gates pour pulse et horizon ne marchent pas


Tables RH :

Agence : matricule ( uuid ) , nom ( string ) , localisation ( string ) , ville

Employe : matricule (uuid) , nom , prenom , adresse , numéro , email

Poste : matricule (uuid) , nom , attributs ( json ) , responsabilités ( json )

Historique_Salaire :  id (uuid) , employe_id (uuid), montant ,  date_debut , date_fin (nullable) , motif ENUM('embauche', 'augmentation', 'promotion', 'réévaluation', 'autre'),
poste_id , agence_id, commentaire )

Affectation_Employe : id (uuid),poste_id , date_attribution , agence_id , employe_id , date_debut, date_fin (nullable)

Bulletin_Paie :  id (uuid), historique_salaire_id (uuid), mois , salaire_brut , deductions , salaire_net , fichier_pdf_path



Tables pressing :

Client : matricule (uuid) , nom , prenom , adresse , numéro , email

Type_Materiau : id (uuid) , nom

Materiau : id (uuid), type_materiau_id , nom, coefficient_prix,  proprietes_specifiques (json)

Produit : nom , composition (json)

Produit_Matériau : matériau_id , produit_id , is_compatible

Commande: numero_commande (uuid) , agence_id , client_id , date_recuperation_prevue .Date de recuperation effective.

Livraison : commande_id , lieu , prix , date_depart , date_reception , employé_id , contact ( nullable )

Service : Nom , prix , description

Article :  nature , service_id , commande_id , réception_défaut , date_réception  , matériau_id

Défaut : nature , détails (json) , article_id

Article_Materiau ( article_id , proportion , materiau_id )

Facture  :  matricule (uuid) , commande_id
( pour avoir le montant de la facture , en fait la somme des prix des articles associés )

Promotion : nom , pourcentage , date_debut , date_fin (nullable)

Facture_Promotion : facture_id , promotion_id


Tables polyvalentes :

Paiement : id ( uuid ) ,  mode , psp ( payment service provider ex: cash , stripe , paylal ) , montant , status , psp_data ( json ) nullable , date_initiation , date_validation , paymentable_id , paymentable_type
( bulletin de paie ou facture )
( une facture peut avoir plusieurs paiement.
On vérifie juste que la somme des montants
des paiements de status `completed` n'excède
jamais le montant de la facture
)

Media : id ( uuid ) , nom , alt_text ( nullable) , type , path , mediaable_type , mediaable_id

Tebles Newsletter :

Newsletter_Message : titre , campagne , status , channels (json)

Newsletter_Contact : email , numero , nom , channels (json)
