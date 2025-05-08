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
./install.sh
```


## Fetch index of Residents for City
> "Een callcenter moet alle bewoners van de gemeente Utrecht kunnen ophalen;"
```http request
GET /api/cities/{city}/residents
```

## Create (Plan) new Ride for Resident
> "Een callcenter moet een rit kunnen inboeken voor een bewoner;"
```http request
POST /api/residents/{resident}/rides

# JSON Body
{
    "from_address": "something 123",
    "to_address": "other 234"
}
```

## Fetch index of rides for TaxiCompany
> "Een taxibedrijf moet ritten kunnen opvragen waarvoor zij verantwoordelijk zijn;"
```php
GET /api/taxi/{taxiCompany}/rides
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
