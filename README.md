# Pure Matcha - Site E-commerce

---

## Description rapide

Site e-commerce de vente de matcha et produits dérivés, développé en PHP avec une base de données PostgreSQL (Supabase). Projet académique BTS SIO.

---

## Table des matières

- Description du projet
- Fonctionnalités
- Architecture technique
- Structure du projet
- Installation locale
- Déploiement Docker
- Base de données
- Difficultés rencontrées
- Limites et améliorations

---

## 1. Description du projet

### 1.1 Objectif

Créer un site e-commerce fonctionnel pour la vente de produits matcha, permettant aux visiteurs de parcourir un catalogue, ajouter des produits au panier, et passer commande.

### 1.2 Fonctionnalités principales

- Catalogue produits avec catégories
- Fiche produit détaillée
- Gestion du panier (visiteurs et utilisateurs connectés)
- Système de commande
- Formulaire de contact
- Service Après-Vente (SAV)
- Inscription / Connexion via Supabase OAuth

### 1.3 Cible

- Passionnés de thé vert
- Amateurs de culture japonaise
- Trend seekers (le matcha est à la mode)

---

## 2. Architecture technique

### 2.1 Stack technologique

| Niveau | Technologie |
|-------|------------|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP 8.2 |
| Base de données | PostgreSQL (Supabase) |
| Authentification | Supabase OAuth |
| Conteneurisation | Docker |
| Hébergement | Render |

### 2.2 Schéma global

```
Frontend (HTML/CSS/JS)
         ↓
    API PHP (Docker/Render)
         ↓
    PostgreSQL (Supabase)
         ↓
    Connection Pooler (IPv4)
```

### 2.3 API externes

- **Supabase** : Authentification OAuth (Google)

---

## 3. Structure du projet

```
projetdev/
├── .env                    # Variables d'environnement locales
├── .gitignore
├── Dockerfile               # Configuration Docker
├── conceptualisation/
│   └── (documents de conception)
└── src/
    ├── index.php           # Point d'entrée
    ├── landingpage.php     # Page d'accueil
    ├── shopping.php       # Catalogue produits
    ├── cart.php          # Panier
    ├── order.php         # Commande
    ├── order_confirmation.php
    ├── my-orders.php    # Historique commandes
    ├── contact.php      # Formulaire contact
    ├── refund.php       # SAV
    ├── login.php        # Connexion
    ├── aboutus.php
    ├── recipes.php
    ├── faq.php
    ├── Pdescription.php  # Fiche produit
    ├── includes/        # Fichiers communs
    │   ├── init.php    # Session PHP
    │   ├── db.php      # Connexion BDD
    │   ├── header.php # En-tête with nav
    │   └── footer.php
    ├── api/            # API PHP
    │   ├── cart/
    │   │   ├── create.php
    │   │   ├── update.php
    │   │   └── delete.php
    │   ├── order/
    │   │   └── create.php
    │   ├── contact/
    │   │   └── send.php
    │   ├── sav/
    │   │   └── create.php
    │   └── session/
    │       ├── logout.php
    │       └──.php
    ├── css/             # Styles CSS
    │   ├── base.css
    │   ├── shopping.css
    │   ├── cart.css
    │   ├── order.css
    │   ├── confirmation.css
    │   └── ...
    ├── js/              # Scripts JavaScript
    │   ├── header.js
    │   ├── auth-handler.js
    │   ├── cart-local.js
    │   └── ...
    └── img/             # Images du projet
```

---

## 4. Installation locale (XAMPP)

### 4.1 Prérequis

- XAMPP (PHP 8.2)
- Navigateur web

### 4.2 Étapes

1. Installer XAMPP avec PHP 8.2
2. Copier le dossier `src/` dans `htdocs/projetdev/`
3. Configurer le fichier `src/includes/db.php` avec les identifiants Supabase
4. Accéder à `http://localhost/projetdev/`

### 4.3 Configuration Base de données

Modifier `src/includes/db.php` :

```php
$host = 'localhost'; // ou l'hôte Supabase
$db   = 'postgres';
$user = 'votre_utilisateur';
$pass = 'votre_mot_de_passe';
```

---

## 5. Déploiement Docker

### 5.1 Construction de l'image

```bash
docker build -t projetdev .
```

### 5.2 Lancement local

```bash
docker run -p 10000:10000 projetdev
```

### 5.3 Déploiement sur Render

1. Créer un nouveau service Web sur Render
2. Relier le repository GitHub
3. Configurer les variables d'environnement dans le dashboard Render :
   - `DB_HOST`
   - `DB_PORT`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`
4. Le fichier `Dockerfile` est automatiquement détecté

---

## 6. Base de données (Schéma)

```sql
-- Table des produits
CREATE TABLE public.products (
  id_product integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  category_product character varying NOT NULL,
  name_product character varying NOT NULL,
  price_product integer NOT NULL,
  long_description character varying NOT NULL,
  short_description character varying NOT NULL,
  image_path character varying NOT NULL
);

-- Table du panier
CREATE TABLE public.cart_items (
  id_cart_item integer PRIMARY KEY,
  id_user uuid,
  id_product integer REFERENCES products(id_product),
  qty integer NOT NULL
);

-- Table des commandes
CREATE TABLE public.orders (
  id_commandes integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  created_at timestamp NOT NULL,
  total_order numeric NOT NULL,
  id_user uuid REFERENCES auth.users(id)
);

-- Table des items de commande
CREATE TABLE public.order_items (
  id_order_item integer PRIMARY KEY,
  id_order integer REFERENCES orders(id_commandes),
  id_product integer REFERENCES products(id_product),
  qty integer NOT NULL
);

-- Table contact
CREATE TABLE public.contact_sheet (
  id_contact integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  full_name character varying NOT NULL,
  email_contact character varying NOT NULL,
  message_contact character varying NOT NULL,
  subject_contact character varying NOT NULL
);

-- Table SAV
CREATE TABLE public.sav (
  id_sav integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  email character varying NOT NULL,
  subject_sav character varying NOT NULL,
  id_user uuid NOT NULL
);
```

---

## 7. Difficultés techniques rencontrées

### 7.1 Configuration Docker

**Problème** : Apache écoute par défaut sur le port 80, Render nécessite le port 10000.

**Solution** : Ajouter dans le Dockerfile :

```dockerfile
RUN sed -i 's/80/10000/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
```

### 7.2 Connexion Base de données (IPv6)

**Problème** : Supabase utilise IPv6 pour la connexion directe, Render ne supporte pas IPv6.

**Solution** : Utiliser le Connection Pooler Supabase en IPv4 :

```
Host: [votre-pooler].pooler.supabase.com
Port: 5432
```

### 7.3 Hébergement initial

**Problème** : Vercel ne supporte pas PHP.

**Solution** : Utiliser Render avec Docker.

### 7.4 Chemins relatifs

**Problème** : Les chemins relatifs (`../css/`) ne fonctionnaient plus après le déplacement des fichiers.

**Solution** : Passer en chemins absolus (`/css/`).

### 7.5 Choix architecture (panier)

**Problème** : Choix du système de stockage pour le panier des visiteurs (localStorage, cookie, session PHP).

**Solution** : Utiliser les Sessions PHP pour unifier la logique entre visiteurs et utilisateurs connect��s.

---

## 8. Limites du projet

- Pas de back-office (administration des produits/commandes)
- Pas de système de paiement intégré (simulé)
- Pas de notifications email
- Pas de design responsive (mobile non optimisé)
- Pas de protection CSRF sur les formulaires

---

## 9. Pistes d'amélioration

### 9.1 Back-office

Interface d'administration pour gérer les produits, commandes et utilisateurs.

### 9.2 Paiement

Intégration d'un système de paiement (Stripe, Mollie).

### 9.3 Responsive Design

Optimisation pour mobile et tablette.

### 9.4 Sécurité

- Protection CSRF
- Validation renforcée des formulaires
- Rate limiting

---

## 10. Auteurs

- Développeur : Nourith Cohen
- Projet académique BTS SIO 1ère année

---

## 11. License

Ce projet est fictif à des fins éducatives. Aucune license spécifique.

---

## 12. Ressources

- Documentation PHP : https://www.php.net/
- Documentation Supabase : https://supabase.com/docs
- Documentation Render : https://render.com/docs
- Docker : https://docs.docker.com/