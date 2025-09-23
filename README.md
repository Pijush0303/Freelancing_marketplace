# Marketplace for Freelancers

[![License: MIT](https://img.shields.io/badge/License-MIT-green)](LICENSE)
[![Status](https://img.shields.io/badge/status-Production%20ready-orange)]()
[![Tech](https://img.shields.io/badge/tech-PHP%2C%20MySQL%2C%20Bootstrap%205-blue)]()

**A full-stack freelancing platform connecting clients and freelancers — posting projects, bidding, escrow payments, messaging, reviews, and admin management.**

---

## Table of contents
- [Overview](#overview)  
- [Key features](#key-features)  
- [Tech stack](#tech-stack)  
- [Architecture & data model](#architecture--data-model)  
- [Quick start (XAMPP / local)](#quick-start-xampp--local)  
- [Configuration](#configuration)  
- [Usage workflow](#usage-workflow)  
- [Database schema (starter)](#database-schema-starter)  
- [Project structure](#project-structure)  
- [Testing](#testing)  
- [Deployment notes & security](#deployment-notes--security)  
- [Screenshots](#screenshots)  
- [Contributing](#contributing)  
- [License](#license)  
- [Authors & contact](#authors--contact)

---

## Overview
This project is a web application where clients can post projects and hire freelancers. It implements user registration, service listings, project posting and bidding, escrow-style payments, real-time messaging, reviews/ratings, and an admin dashboard for moderation and dispute resolution. It was built as an academic / capstone project; the codebase includes frontend, backend (PHP), and database schema.

---

## Key features
- Role-based authentication: **client**, **freelancer**, **admin**  
- Freelancer profiles with skills, portfolio and pricing packages  
- Project posting by clients and bidding/submission by freelancers  
- Escrow payment flow: client deposits to escrow; freelancer paid after approval  
- Real-time messaging (WebSocket recommended) with AJAX fallback  
- Ratings & reviews on project completion  
- Admin panel to manage users, projects, disputes and payouts  
- Search & filter by category, price, rating and location  
- File attachments for deliverables and milestone tracking

---

## Tech stack
- Frontend: HTML5, CSS3, Bootstrap 5, vanilla JavaScript  
- Backend: PHP (compatible with PHP 7.x and 8.x)  
- Database: MySQL / MariaDB  
- Optional realtime: WebSocket server (Node.js or PHP Ratchet) or AJAX long-polling fallback  
- Local dev: XAMPP (Windows) / LAMP (Linux) / MAMP (macOS)  
- Version control: Git, GitHub

---

## Architecture & data model
High level:
- Browser ⇄ PHP web server ⇄ MySQL database  
- Real-time chat via a WebSocket server (recommended to run separately)  
- Payment integration with third-party gateways (Stripe/PayPal) — app manages escrow records and calls gateway APIs for actual transfers

Core entities:
- `users` (clients / freelancers / admins)  
- `services` (freelancer offerings)  
- `projects` (job posts by clients)  
- `bids` (freelancer proposals)  
- `payments` (escrow records and statuses)  
- `messages` (chat history)  
- `reviews` (post-completion ratings)

---

## Quick start (XAMPP / local)
1. **Prerequisites**
   - Install XAMPP (or LAMP/MAMP), PHP 7.x/8.x, MySQL/MariaDB.  
   - (Optional) Composer for PHP packages.

2. **Clone repository**
```bash
git clone https://github.com/<your-username>/marketplace-freelancers.git
cd marketplace-freelancers
