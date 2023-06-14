# LAMP-app

Gitrepot är baserat på en LAMP-stack - Linux, Apache, MySQL (MariaDB), PHP.

---

**För att testa repot** Klona ner report och gör följande. 
(Detta förutsätter att du har Docker Desktop installerat på din dator `https://www.docker.com/products/docker-desktop/`)

---

Öppna en terminal och kör kommandot:

`docker-compose up`

Starta en webbläsare och navigera till `localhost:8088`. Filen `index.php` är i detta repo enbart en fail-safe. Navigera istället till `localhost:8088/dashboard.php`.
Du blir nu istället omdirigerad till `localhost:8088/login.php` där du kan logga in. Men är detta första gången du besöker detta CMS så behöver du istället börja med att registrera en användare. Detta kan du göra genom att klicka på den blå länken `create an account`. 

Du kommer nu till sidan `localhost:8088/register.php` där du kan ange ett användarnamn och ett lösenord. När du registrerat dig blir du återigen omdirigerad till sidan 
`localhost:8088/login.php` där du nu kan logga in med samma uppgifter du nyss registrerade dig med.

**Välkommen till Dashboard!**

Här är startsidan av detta CMS. Här ser du din användare som du är inloggad som, möjlighet att logga ut samt användarinställningar där du kan ändra användarnamn, lösenord eller helt
ta bort din användare.

Navigera till `http://localhost:8088/pages.php` eller klicka på Pages i menyn till vänster för att komma till den mer centrala delen i denna CRUD-applikation. Här kan du skapa en resurs(page), besöka en skapad page, editera, och ta bort.

Om du navigerar till `http://localhost:8088/users.php` eller klicka på Users i menyn till vänster så får du fram en lista på samtliga användare i detta CMS. Här ser du användaren namn, när den skapades, vilket ID den har samt när den senast loggade in på sidan.



---

### phpMyAdmin

---

Navigera till  `localhost:8089`

Logga in med de uppgifter som finns i `docker-compose.yml`

*Server:* **mysql**

*Användarnamn:* **db_user**

*Lösenord:* **db_password**

När du loggat in visas den databas som skapades i samband med att instruktioner kördes i `docker-compose.yml`: **db_lamp_app**