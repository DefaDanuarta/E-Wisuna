# Public Complaint Management System  

<table>
  <tr>
    <td align="center" width="100%">
      <!-- Ganti link gambar di bawah ini dengan plot hero kamu -->
      <img width="100%" alt="hero-plot" src="https://github.com/DefaDanuarta/E-Wisuna/blob/83183fffa2eeb968fc233f398f19e32dbcd2be7a/documentation/admin-dashboard.png">
    </td>
  </tr>
</table>
Hello there, this was my project while I was a vocational high school student in Wira Harapan Badung, Bali. This project is mandatory in order to accomplish the requirement of graduating. So thats why I made a web-based platform for managing public complaints with multi-role access control. 
This project wad built using **PHP (no framework)**, **MySQL**, **Bootstrap 5**, and **XAMPP** as the local development environment.

This project was developed as a final assignment during my vocational high school period (2023).  
Development duration: **2–3 weeks**.

## Publisher
Defa Danuarta (Vocational Student who Majored in Software Engineering)
<br>

## Built Time
This project was developed while I was pursuing my education in Wira Harapan Vocational High School.  
<br>

---

## 🚀 Features

### **👤 Masyarakat (Public User)**
- Submit new complaints.
- Edit or update submitted complaints.
- Track complaint status.

### **🛠️ Petugas (Staff)**
- Validate submitted complaints.
- Process pending complaints.
- Send replies or status updates to users.

### **🧑‍💼 Admin**
- View all complaints, users, and activity logs.
- Manage users (masyarakat & petugas).
- Monitor the overall complaint workflow.
- Respond to complaints if needed.

---

## 🗂️ Project Structure
```
E-Wisuna/
├── 01DB/                 # Database export or schema
├── admin/                # Admin pages & controllers
├── assets/               # CSS, JS, images, etc.
├── config/               # Database configuration & core settings
├── documentation/        # Additional docs (if any)
├── errors/               # Error handling views/pages
├── layouts/              # Layout templates
├── masyarakat/           # Public user pages
├── template/             # Reusable UI components
├── home.php              # Main dashboard
├── index.php             # Landing page
├── login.php             # Authentication login page
└── registrasi.php        # User registration page
```

---

## 🛠️ Tech Stack

| Category | Tools |
|---------|-------|
| **Backend** | PHP (Native, no framework) |
| **Frontend** | Bootstrap 5, HTML, CSS |
| **Database** | MySQL (phpMyAdmin via XAMPP) |
| **Local Server** | XAMPP (Apache & MySQL) |

---

## 🔐 Role-Based Access Flow
Masyarakat -> Submit Complaint <br>
Petugas -> Validate & Respond <br>
Admin -> Monitor, Manage Users, Review Logs <br>

---

## 📌 Key Highlights
- Fully functional multi-role web application.
- Designed with CRUD operations for complaints, users, and validations.
- Clean Bootstrap UI for ease of use.
- Built without frameworks — fully native PHP logic.

---

## 📷 Screenshots (Optional)  
Example:
<table>
  <tr>
    <td align="center" width="100%">
      <img width="100%" alt="hero-plot" src="https://github.com/DefaDanuarta/E-Wisuna/blob/83183fffa2eeb968fc233f398f19e32dbcd2be7a/documentation/list-pengaduan.png">
    </td>
  </tr>
  <tr>
    <td align="center" width="100%">
      <img width="100%" alt="hero-plot" src="https://github.com/DefaDanuarta/E-Wisuna/blob/83183fffa2eeb968fc233f398f19e32dbcd2be7a/documentation/petugas-dashboard.png">
    </td>
  </tr>
</table>
