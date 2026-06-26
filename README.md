# 🚀 AI-Powered Career Navigator

A full-stack AI application that analyzes resumes, suggests job roles, identifies skill gaps, and generates personalized learning roadmaps.

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | React 18, Tailwind CSS |
| Backend | PHP 8.2, Laravel 11 |
| AI | Claude API (Anthropic) |
| Cloud | Microsoft Azure (Free Tier) |
| Infrastructure | Terraform |
| CI/CD | GitHub Actions |
| Storage | Azure Blob Storage |
| Database | Azure MySQL Flexible Server |

## 🏗️ Architecture
React Frontend (Azure Static Web Apps)

↓

PHP Laravel API (Azure App Service)

↓

Claude AI API ←→ Azure Blob Storage

↓

Azure MySQL Database

## 📁 Project Structure
ai-career-navigator/

├── frontend/          # React application

├── backend/           # Laravel PHP API

├── infrastructure/    # Terraform (Azure IaC)

└── .github/workflows/ # CI/CD pipelines

## 🚀 Getting Started

### Prerequisites
- Node.js 18+
- PHP 8.2+
- Composer
- Terraform 1.6+
- Azure CLI
- Azure Free Account

### Local Development
```bash
# Frontend
cd frontend && npm install && npm run dev

# Backend
cd backend && composer install && php artisan serve
```

## 📖 Learning Journey

This project is part of my learning roadmap covering:
- ✅ React (Frontend)
- ✅ Laravel/PHP (Backend API)
- 🔄 Azure Cloud (In Progress)
- 🔄 Terraform (In Progress)
- 🔄 GitHub Actions CI/CD (In Progress)

## 🔧 Challenges & Solutions

### Azure MySQL Regional Capacity
**Problem:** Azure MySQL Flexible Server returned `ProvisionNotSupportedForRegion` 
across all regions on a free trial subscription.  
**Solution:** Queried available regions via Azure CLI, upgraded subscription to 
Pay-As-You-Go, and temporarily used local Docker MySQL for development while 
keeping MySQL Terraform code commented and ready for production deployment.

### Terraform State Drift
**Problem:** A failed `terraform apply` left state file out of sync with 
actual Azure resources.  
**Solution:** Used `az group list` to diagnose the drift, then made a conscious 
decision between `terraform import` (production-safe) vs. clean deletion 
(faster for dev). Chose clean deletion as no production data was at risk.

### Windows/Linux Environment Separation  
**Problem:** Azure CLI and Terraform installed in WSL2 Ubuntu were not 
accessible from Windows PowerShell.  
**Solution:** Standardized all infrastructure work in WSL2 Ubuntu, accessing 
Windows project files via `/mnt/d/` mount — mirroring real DevOps team workflows.

## 🔧 Challenges & Solutions

### Azure MySQL Regional Capacity
**Problem:** Azure MySQL Flexible Server returned `ProvisionNotSupportedForRegion` 
across all regions on a free trial subscription.  
**Solution:** Queried available regions via Azure CLI, upgraded subscription to 
Pay-As-You-Go, and temporarily used local Docker MySQL for development while 
keeping MySQL Terraform code commented and ready for production deployment.

### Terraform State Drift
**Problem:** A failed `terraform apply` left state file out of sync with 
actual Azure resources.  
**Solution:** Used `az group list` to diagnose the drift, then made a conscious 
decision between `terraform import` (production-safe) vs. clean deletion 
(faster for dev). Chose clean deletion as no production data was at risk.

### Windows/Linux Environment Separation  
**Problem:** Azure CLI and Terraform installed in WSL2 Ubuntu were not 
accessible from Windows PowerShell.  
**Solution:** Standardized all infrastructure work in WSL2 Ubuntu, accessing 
Windows project files via `/mnt/d/` mount — mirroring real DevOps team workflows.

## 👨‍💻 Author

**Panky** — Full Stack Developer
- GitHub: [@Pankajamml](https://github.com/Pankajamml)

