# Configurazione del Test di Prenotazione in Laravel  

## Installations

```bash
docker compose build
```

```bash
docker compose up -d
```

```bash
docker compose exec app php artisan migrate
```

## API v1 Endpoints

### Auth Token
- `GET /connect`


### Customer Routes
- `GET /v1/customers`
- `POST /v1/customers`  
- `GET /v1/customers/{id}`
- `PUT /v1/customers/{id}`
- `DELETE /v1/customers/{id}`

### Booking Routes
- `GET /v1/bookings`  
- `POST /v1/bookings`
- `GET /v1/bookings/{id}`
- `PUT /v1/bookings/{id}`
- `DELETE /v1/bookings/{id}`

### Export Routes
- `GET /v1/export/customers`
- `GET /v1/export/bookings`


### **Ambiente di Sviluppo**  
- Configurato principalmente su **Windows** con:  
  - **XAMPP** (Apache/MySQL)  
  - **Composer** (gestore di dipendenze PHP)  
  - **Docker** (incluso per compatibilità con Linux)  

### **Strumenti e Tecnologie Utilizzate**  
- **Code Pilot** (sviluppo assistito da AI)  
- **Postman** (test delle API)  
- Altri strumenti di ricerca per debug e ottimizzazione  

### **Nota Linguistica**  
*Non sono fluente in italiano, ma ho un’ottima padronanza dell’inglese. Il codice e la documentazione sono scritti in inglese per chiarezza.*  
