# PAQT Technical Assessment

Bewoners van de gemeente Utrecht met een beperking komen in aanmerking voor een WMO-subsidie
(Wet Maatschappelijke Ondersteuning). Dankzij deze subsidie kunnen bewoners tegen een beperkte
vergoeding reizen met de ondersteuning die zij nodig hebben. Als een aanvraag wordt goedgekeurd door
de gemeente dan ontvangt de bewoner een zogenaamde beschikking. Deze beschikking is een jaar
geldig en wordt iedere jaar automatisch verlengd, tenzij de subsidie wordt stopgezet door de gemeente.

Een beschikking heeft een budget, dit is het totale aantal kilometers dat de bewoner jaarlijks mag
reizen zolang de beschikking actief is. Het budget wordt jaarlijks gereset zolang de beschikking actief
is.

Bewoners met een beschikking kunnen via een callcenter een rit boeken bij een taxibedrijf. De
gemeente is opgedeeld in zogenaamde percelen (= geografische gebieden) en voor ieder perceel is een
enkel taxibedrijf verantwoordelijk voor het uitvoeren van ritten. Het woonadres van de bewoner is
bepalend welk perceel gebruikt moet worden voor het boeken van een rit door het callcenter. We vragen
je een API te maken waar de verschillende partijen gebruik van kunnen maken.

Authenticatie is al eens eerder gemaakt door een derde partij. Alleen de functionaliteit die hieronder
wordt benoemd is relevant.

De volgende functionaliteit moet beschikbaar zijn via de API:
- Een callcenter moet alle bewoners van de gemeente Utrecht kunnen ophalen;
- Een callcenter moet een rit kunnen inboeken voor een bewoner;
- Een taxibedrijf moet ritten kunnen opvragen waarvoor zij verantwoordelijk zijn;
- Het budget van actieve beschikkingen moet jaarlijks automatisch gereset kunnen worden.


## Setup
Run the installer script to boot up this Laravel Sail environment:
```shell
./install.sh # ;-)
```
 If you really need to rebuild (https://laravel.com/docs/12.x/sail#rebuilding-sail-images):
```shell
docker compose down -v
sail build --no-cache
sail up
# and check the key, .env and migrations ;-)
```


## Fetch index of Residents for City
> "Een callcenter moet alle bewoners van de gemeente Utrecht kunnen ophalen;"
### Request
```http request
GET /api/cities/{city}/residents
```
### Response
```json
{
    "data": [
        {
            "first_name": "Jamison",
            "last_name": "Dibbert",
            "address": "324 Balistreri Ways Suite 741\nStiedemannbury, MA 10324"
        },
        {
            "first_name": "Freeman",
            "last_name": "Ernser",
            "address": "297 Ellie Lake\nNew Germainemouth, RI 71989"
        },
        {
            "first_name": "Dora",
            "last_name": "Turner",
            "address": "78756 Ezra Divide Suite 223\nLindgrenburgh, TN 24512-0440"
        },
        {
            "first_name": "Annetta",
            "last_name": "Hegmann",
            "address": "7334 Brekke Ford Suite 444\nEast Michelle, OH 63787-3030"
        },
        {
            "first_name": "Clinton",
            "last_name": "Stehr",
            "address": "655 Littel Lane\nBaileyton, NH 89488"
        }
    ]
}
```

## Create (Plan) new Ride for Resident
> "Een callcenter moet een rit kunnen inboeken voor een bewoner;"
### Request 
```http request
POST /api/residents/{resident}/rides

# JSON Body
{
    "from_address": "something 123",
    "to_address": "other 234"
}
```
### Response
```json
{
    "from_address": "Something 123",
    "to_address": "Other 234",
    "taxi_company_id": 3,
    "resident_id": 1,
    "updated_at": "2025-05-08T22:37:11.000000Z",
    "created_at": "2025-05-08T22:37:11.000000Z",
    "id": 251,
    "taxi_company": {
        "id": 3,
        "name": "Lakin-Upton",
        "created_at": "2025-05-08T22:32:11.000000Z",
        "updated_at": "2025-05-08T22:32:11.000000Z"
    }
}
```

## Fetch index of rides for TaxiCompany
> "Een taxibedrijf moet ritten kunnen opvragen waarvoor zij verantwoordelijk zijn;"
### Request
```php
GET /api/taxi/{taxiCompany}/rides
```
### Response
```json
{
    "data": [
        {
            "id": 1,
            "resident_id": 1,
            "taxi_company_id": 1,
            "from_address": "852 Samanta Plain\nNorth Eriberto, OH 54231-6775",
            "to_address": "2118 Alexandrine Island Suite 618\nZoilafurt, MS 99485",
            "created_at": "2025-05-08T22:32:11.000000Z",
            "updated_at": "2025-05-08T22:32:11.000000Z"
        }
        //...
    ]
}
```


## Update Budgets of Residents
> "Het budget van actieve beschikkingen moet jaarlijks automatisch gereset kunnen worden."

```php
# Confirm the command is scheduled to run each day.
sail artisan schedule:list

# Run the command manually
sail artisan app:reset-resident-budgets

```

## Notes
### API
The API is set up using JSON resources and JsonApi Controllers.  
Therefor every request should be sent with the following 'Accept' header:
```
Accept: application/json
```

### Database
The database is currently seeded using random (faker) data. If you need to recreate data:
```
sail artisan migrate:fresh --seed 
```
