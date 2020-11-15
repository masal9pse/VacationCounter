# create API practice

api/register

```bash
curl -X POST -H "Content-Type: application/json" -d \
'{"name":"masato1984", "email":"test@test.com","password":"password123","password_confirmation":"password123"}' \
 localhost:8000/api/register
```
