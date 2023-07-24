# DesarrolloWebBackend

Rodrigo Gutiérrez Lobos | 20.154.104-2 | ICINF

PERROS

-   **POST** http://127.0.0.1:8000/api/perro/guardar

```json
{
    "nombre": "PerroChiquito",
    "url": "https://images.dog.ceo/breeds/cattledog-australian/IMG_1042.jpg",
    "descripcion": "es un perro chiquito"
}
```

```json
{
    "nombre": "PerroNoTanChiquito",
    "url": "https://images.dog.ceo/breeds/poodle-miniature/n02113712_3203.jpg",
    "descripcion": "tambien es un perro chiquito"
}
```

-   **POST** http://127.0.0.1:8000/api/perro/actualizar

```json
{
    "id": 1,
    "nombre": "PerroChiquitoMOD",
    "url": "https://images.dog.ceo/breeds/cattledog-australian/IMG_1042.jpg",
    "descripcion": "es un perro chiquitoMOD"
}
```

```json
{
    "id": 2,
    "nombre": "PerroNoTanChiquitoMOD",
    "url": "https://images.dog.ceo/breeds/poodle-miniature/n02113712_3203.jpg",
    "descripcion": "tambien es un perro chiquitoMOD"
}
```

-   **POST** http://127.0.0.1:8000/api/perro/eliminar

```json
{
    "id": 1
}
```

```json
{
    "id": 2
}
```

-   **GET** http://127.0.0.1:8000/api/perro/listar

INTERACCIONES

-   **POST** http://127.0.0.1:8000/api/interaccion/guardar

```json
{
    "perro_interesado_id": 1,
    "perro_candidato_id": 2,
    "preferencia": "Aceptado"
}
```

```json
{
    "perro_interesado_id": 2,
    "perro_candidato_id": 1,
    "preferencia": "Rechazado"
}
```

-   **GET** http://127.0.0.1:8000/api/interaccion/listar

```json
{
    "perro_interesado_id": 1
}
```

```json
{
    "perro_interesado_id": 2
}
```
