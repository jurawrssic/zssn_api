---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_96f4a6d1c576a13b4c0e3726043f0f01 -->
## Display a listing of the Survivor resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/survivors" 
```

```javascript
const url = new URL("http://localhost/api/survivors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "name": "Julia",
            "age": 23,
            "gender": "Female",
            "lastLocation": "a:2:{i:0;N;i:1;N;}",
            "infected": 1,
            "infectedReports": 3,
            "inventory_id": 1,
            "created_at": "2019-07-29 08:40:41",
            "updated_at": "2019-07-29 12:34:14"
        },
        {
            "name": "Alexandre",
            "age": 21,
            "gender": "Male",
            "lastLocation": "a:2:{i:0;d:-25.3935;i:1;d:-51.4562;}",
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 2,
            "created_at": "2019-07-29 08:42:03",
            "updated_at": "2019-07-29 08:42:03"
        },
        {
            "name": "Eloisa Volkman",
            "age": 4,
            "gender": "Necessitatibus aut delectus sapiente in consectetur. Incidunt dicta non saepe et aliquam aspernatur est. Ad ratione et magnam soluta necessitatibus minus sed.",
            "lastLocation": [
                -16.467964,
                26.513807
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 4,
            "created_at": "2019-07-30 00:38:29",
            "updated_at": "2019-07-30 00:38:29"
        },
        {
            "name": "Reyes Wiegand",
            "age": 57,
            "gender": "Minima quo voluptatem voluptatem voluptas et. Non quod blanditiis numquam quis officiis vitae minima blanditiis. Delectus rerum fuga quis enim ex sit. Dolor illo sequi et rerum aut.",
            "lastLocation": [
                -36.218441,
                -95.079571
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 5,
            "created_at": "2019-07-30 00:39:33",
            "updated_at": "2019-07-30 00:39:33"
        },
        {
            "name": "Ms. Mozell Okuneva IV",
            "age": 53,
            "gender": "Quis aut tempore ad eius in veritatis sequi in. Est veniam similique tenetur sed ea dolorem. Aut voluptas repellendus dolorum rerum est.",
            "lastLocation": [
                -64.898627,
                159.984455
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 6,
            "created_at": "2019-07-30 00:39:48",
            "updated_at": "2019-07-30 00:39:48"
        },
        {
            "name": "Prof. May Balistreri",
            "age": 78,
            "gender": "Officia quidem deleniti non voluptate maxime placeat voluptatem. Odit laudantium vel error repellendus nesciunt. Possimus quisquam libero consequatur aperiam vel. Et est et rem quam quae.",
            "lastLocation": [
                12.945861,
                -109.79839
            ],
            "infected": 0,
            "infectedReports": 2,
            "inventory_id": 7,
            "created_at": "2019-07-30 00:40:25",
            "updated_at": "2019-07-30 00:40:25"
        },
        {
            "name": "Pearlie Beer",
            "age": 0,
            "gender": "Autem tenetur et ipsum laborum fuga officiis voluptas. Id autem nihil neque ullam consequuntur eos id asperiores. Alias non cumque a in illum.",
            "lastLocation": [
                41.922078,
                142.270254
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 8,
            "created_at": "2019-07-30 00:42:14",
            "updated_at": "2019-07-30 00:42:14"
        },
        {
            "name": "Michale Barrows I",
            "age": 63,
            "gender": "Ea nobis aperiam alias cupiditate iusto. Ullam est sunt hic ipsam velit. Accusantium tempora quibusdam consequatur.",
            "lastLocation": [
                11.345565,
                86.412588
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 9,
            "created_at": "2019-07-30 00:42:50",
            "updated_at": "2019-07-30 00:42:50"
        },
        {
            "name": "Veda Wisoky",
            "age": 98,
            "gender": "Nulla dicta laudantium ea quia atque eveniet dolore. Voluptate quasi aut repudiandae qui qui neque voluptatem. Nemo ipsam saepe ut. Voluptate facere a officiis neque qui.",
            "lastLocation": [
                -43.22081,
                124.31119
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 10,
            "created_at": "2019-07-30 00:43:10",
            "updated_at": "2019-07-30 00:43:10"
        },
        {
            "name": "Ms. Hilda Wunsch",
            "age": 79,
            "gender": "Female",
            "lastLocation": [
                -11.898017,
                -115.695314
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 12,
            "created_at": "2019-07-30 00:46:59",
            "updated_at": "2019-07-30 00:46:59"
        },
        {
            "name": "Leopold Morar",
            "age": 21,
            "gender": "Female",
            "lastLocation": [
                45.25332,
                72.472516
            ],
            "infected": 0,
            "infectedReports": 2,
            "inventory_id": 13,
            "created_at": "2019-07-30 00:49:17",
            "updated_at": "2019-07-30 00:49:17"
        },
        {
            "name": "Mr. Boyd Beer",
            "age": 59,
            "gender": "Male",
            "lastLocation": [
                85.892422,
                -66.086924
            ],
            "infected": 0,
            "infectedReports": 2,
            "inventory_id": 14,
            "created_at": "2019-07-30 00:55:52",
            "updated_at": "2019-07-30 00:55:52"
        },
        {
            "name": "Athena Labadie",
            "age": 6,
            "gender": "Male",
            "lastLocation": [
                -86.999507,
                69.382602
            ],
            "infected": 1,
            "infectedReports": 1,
            "inventory_id": 15,
            "created_at": "2019-07-30 01:07:21",
            "updated_at": "2019-07-30 01:07:21"
        },
        {
            "name": "Miss Victoria Glover",
            "age": 8,
            "gender": "Male",
            "lastLocation": [
                -88.712293,
                120.765355
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 16,
            "created_at": "2019-07-30 01:08:06",
            "updated_at": "2019-07-30 01:08:06"
        },
        {
            "name": "Dr. Maybell Kub Jr.",
            "age": 89,
            "gender": "Female",
            "lastLocation": [
                26.096859,
                -133.064797
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:11:39",
            "updated_at": "2019-07-30 01:11:39"
        },
        {
            "name": "Josue Rau",
            "age": 45,
            "gender": "Male",
            "lastLocation": [
                75.053296,
                -78.691858
            ],
            "infected": 1,
            "infectedReports": 1,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:12:21",
            "updated_at": "2019-07-30 01:12:21"
        },
        {
            "name": "Ethyl Willms",
            "age": 39,
            "gender": "Male",
            "lastLocation": [
                14.527118,
                -87.016201
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:12:31",
            "updated_at": "2019-07-30 01:12:31"
        },
        {
            "name": "Aida Kovacek",
            "age": 50,
            "gender": "Male",
            "lastLocation": [
                23.764165,
                53.818373
            ],
            "infected": 1,
            "infectedReports": 2,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:15:14",
            "updated_at": "2019-07-30 01:15:14"
        },
        {
            "name": "Kelsie Ritchie",
            "age": 15,
            "gender": "Female",
            "lastLocation": [
                83.420945,
                -89.135659
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:15:49",
            "updated_at": "2019-07-30 01:15:49"
        },
        {
            "name": "Victor Dare",
            "age": 7,
            "gender": "Male",
            "lastLocation": [
                -15.364732,
                1.050727
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:23:11",
            "updated_at": "2019-07-30 01:23:11"
        },
        {
            "name": "Quentin Denesik",
            "age": 63,
            "gender": "Female",
            "lastLocation": [
                -9.445877,
                171.607167
            ],
            "infected": 1,
            "infectedReports": 2,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:23:56",
            "updated_at": "2019-07-30 01:23:56"
        },
        {
            "name": "Ron Schmidt",
            "age": 18,
            "gender": "Female",
            "lastLocation": [
                -30.793359,
                -165.376063
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:24:18",
            "updated_at": "2019-07-30 01:24:18"
        },
        {
            "name": "Prof. Adrienne Jones",
            "age": 87,
            "gender": "Female",
            "lastLocation": [
                32.217986,
                105.528284
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:25:38",
            "updated_at": "2019-07-30 01:25:38"
        },
        {
            "name": "Michele Monahan",
            "age": 26,
            "gender": "Male",
            "lastLocation": [
                3.259202,
                -149.698193
            ],
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:26:30",
            "updated_at": "2019-07-30 01:26:30"
        },
        {
            "name": "Dr. Immanuel Lemke",
            "age": 45,
            "gender": "Male",
            "lastLocation": [
                -33.293773,
                136.504172
            ],
            "infected": 1,
            "infectedReports": 2,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:29:43",
            "updated_at": "2019-07-30 01:29:43"
        },
        {
            "name": "Miss Ena Rath I",
            "age": 38,
            "gender": "Female",
            "lastLocation": [
                -77.204169,
                42.42304
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:31:32",
            "updated_at": "2019-07-30 01:31:32"
        },
        {
            "name": "Dr. Rosalia Bayer",
            "age": 48,
            "gender": "Female",
            "lastLocation": [
                53.421759,
                -166.135953
            ],
            "infected": 1,
            "infectedReports": 2,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:31:55",
            "updated_at": "2019-07-30 01:31:55"
        },
        {
            "name": "Levi McClure",
            "age": 45,
            "gender": "Male",
            "lastLocation": [
                9.207482,
                11.909312
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:33:41",
            "updated_at": "2019-07-30 01:33:41"
        },
        {
            "name": "Terrill McCullough",
            "age": 20,
            "gender": "Female",
            "lastLocation": [
                84.399594,
                59.999732
            ],
            "infected": 1,
            "infectedReports": 1,
            "inventory_id": 0,
            "created_at": "2019-07-30 01:38:06",
            "updated_at": "2019-07-30 01:38:06"
        },
        {
            "name": "Richard Witting",
            "age": 72,
            "gender": "Female",
            "lastLocation": [
                35.723302,
                4.590894
            ],
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 33,
            "created_at": "2019-07-30 01:39:35",
            "updated_at": "2019-07-30 01:39:35"
        },
        {
            "name": "Kevon Boyer",
            "age": 80,
            "gender": "Female",
            "lastLocation": [
                13.330556,
                23.949826
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 34,
            "created_at": "2019-07-30 01:40:11",
            "updated_at": "2019-07-30 01:40:11"
        },
        {
            "name": "Prof. Hilario Douglas IV",
            "age": 86,
            "gender": "Female",
            "lastLocation": [
                38.47744,
                119.200702
            ],
            "infected": 0,
            "infectedReports": 2,
            "inventory_id": 35,
            "created_at": "2019-07-30 01:41:31",
            "updated_at": "2019-07-30 01:41:31"
        },
        {
            "name": "Eliezer Nader",
            "age": 90,
            "gender": "Female",
            "lastLocation": [
                -32.553744,
                -97.009452
            ],
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 37,
            "created_at": "2019-07-30 01:46:22",
            "updated_at": "2019-07-30 01:46:22"
        },
        {
            "name": "Marcelino Wiegand",
            "age": 57,
            "gender": "Male",
            "lastLocation": {
                "latitude": -60.487397,
                "longitude": 137.290003
            },
            "infected": 0,
            "infectedReports": 0,
            "inventory_id": 38,
            "created_at": "2019-07-30 01:48:19",
            "updated_at": "2019-07-30 01:48:19"
        },
        {
            "name": "Saige Durgan",
            "age": 51,
            "gender": "Female",
            "lastLocation": {
                "latitude": -53.835456,
                "longitude": 153.710439
            },
            "infected": 1,
            "infectedReports": 1,
            "inventory_id": 39,
            "created_at": "2019-07-30 01:50:49",
            "updated_at": "2019-07-30 01:50:49"
        },
        {
            "name": "Savanna Reilly",
            "age": 35,
            "gender": "Female",
            "lastLocation": {
                "latitude": -42.644851,
                "longitude": 90.470281
            },
            "infected": 0,
            "infectedReports": 1,
            "inventory_id": 40,
            "created_at": "2019-07-30 01:51:48",
            "updated_at": "2019-07-30 01:51:48"
        },
        {
            "name": "Maynard Jenkins",
            "age": 60,
            "gender": "Male",
            "lastLocation": {
                "latitude": -59.510427,
                "longitude": 89.715196
            },
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 41,
            "created_at": "2019-07-30 01:52:13",
            "updated_at": "2019-07-30 01:52:13"
        },
        {
            "name": "Holden Stanton",
            "age": 97,
            "gender": "Female",
            "lastLocation": {
                "latitude": -46.896206,
                "longitude": -156.887723
            },
            "infected": 1,
            "infectedReports": 0,
            "inventory_id": 42,
            "created_at": "2019-07-30 01:53:11",
            "updated_at": "2019-07-30 01:53:11"
        },
        {
            "name": "Naomi Runolfsson",
            "age": 57,
            "gender": "Male",
            "lastLocation": {
                "latitude": -68.570916,
                "longitude": -111.49804
            },
            "infected": 1,
            "infectedReports": 1,
            "inventory_id": 43,
            "created_at": "2019-07-30 01:53:33",
            "updated_at": "2019-07-30 01:53:33"
        }
    ]
}
```

### HTTP Request
`GET api/survivors`


<!-- END_96f4a6d1c576a13b4c0e3726043f0f01 -->

<!-- START_5c76cfa6f3fd7bc7b6057da363225981 -->
## Display the specified Survivor resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/survivors/1" 
```

```javascript
const url = new URL("http://localhost/api/survivors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/survivors/{id}`


<!-- END_5c76cfa6f3fd7bc7b6057da363225981 -->

<!-- START_fa4326bcefe52d47c9643ed87fc5f289 -->
## Display a listing of the Inventory resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/inventories" 
```

```javascript
const url = new URL("http://localhost/api/inventories");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "qtyWater": 3,
            "qtyFood": 9,
            "qtyMedication": 7,
            "qtyAmmo": 1,
            "created_at": "2019-07-29 08:40:41",
            "updated_at": "2019-07-29 10:57:52"
        },
        {
            "qtyWater": 2,
            "qtyFood": 10,
            "qtyMedication": 3,
            "qtyAmmo": 4,
            "created_at": "2019-07-29 08:42:03",
            "updated_at": "2019-07-29 10:57:52"
        },
        {
            "qtyWater": 8,
            "qtyFood": 4,
            "qtyMedication": 4,
            "qtyAmmo": 4,
            "created_at": "2019-07-30 00:37:03",
            "updated_at": "2019-07-30 00:37:03"
        },
        {
            "qtyWater": 3,
            "qtyFood": 8,
            "qtyMedication": 8,
            "qtyAmmo": 5,
            "created_at": "2019-07-30 00:38:29",
            "updated_at": "2019-07-30 00:38:29"
        },
        {
            "qtyWater": 7,
            "qtyFood": 3,
            "qtyMedication": 7,
            "qtyAmmo": 5,
            "created_at": "2019-07-30 00:39:33",
            "updated_at": "2019-07-30 00:39:33"
        },
        {
            "qtyWater": 6,
            "qtyFood": 1,
            "qtyMedication": 4,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 00:39:48",
            "updated_at": "2019-07-30 00:39:48"
        },
        {
            "qtyWater": 6,
            "qtyFood": 8,
            "qtyMedication": 2,
            "qtyAmmo": 10,
            "created_at": "2019-07-30 00:40:25",
            "updated_at": "2019-07-30 00:40:25"
        },
        {
            "qtyWater": 6,
            "qtyFood": 5,
            "qtyMedication": 5,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 00:42:14",
            "updated_at": "2019-07-30 00:42:14"
        },
        {
            "qtyWater": 6,
            "qtyFood": 8,
            "qtyMedication": 2,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 00:42:50",
            "updated_at": "2019-07-30 00:42:50"
        },
        {
            "qtyWater": 7,
            "qtyFood": 5,
            "qtyMedication": 7,
            "qtyAmmo": 8,
            "created_at": "2019-07-30 00:43:10",
            "updated_at": "2019-07-30 00:43:10"
        },
        {
            "qtyWater": 7,
            "qtyFood": 9,
            "qtyMedication": 1,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 00:44:56",
            "updated_at": "2019-07-30 00:44:56"
        },
        {
            "qtyWater": 9,
            "qtyFood": 0,
            "qtyMedication": 10,
            "qtyAmmo": 10,
            "created_at": "2019-07-30 00:46:59",
            "updated_at": "2019-07-30 00:46:59"
        },
        {
            "qtyWater": 9,
            "qtyFood": 4,
            "qtyMedication": 6,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 00:49:17",
            "updated_at": "2019-07-30 00:49:17"
        },
        {
            "qtyWater": 1,
            "qtyFood": 3,
            "qtyMedication": 1,
            "qtyAmmo": 4,
            "created_at": "2019-07-30 00:55:52",
            "updated_at": "2019-07-30 00:55:52"
        },
        {
            "qtyWater": 4,
            "qtyFood": 2,
            "qtyMedication": 2,
            "qtyAmmo": 1,
            "created_at": "2019-07-30 01:07:21",
            "updated_at": "2019-07-30 01:07:21"
        },
        {
            "qtyWater": 9,
            "qtyFood": 1,
            "qtyMedication": 5,
            "qtyAmmo": 10,
            "created_at": "2019-07-30 01:08:06",
            "updated_at": "2019-07-30 01:08:06"
        },
        {
            "qtyWater": 9,
            "qtyFood": 8,
            "qtyMedication": 7,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 01:11:22",
            "updated_at": "2019-07-30 01:11:22"
        },
        {
            "qtyWater": 3,
            "qtyFood": 0,
            "qtyMedication": 0,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:11:39",
            "updated_at": "2019-07-30 01:11:39"
        },
        {
            "qtyWater": 5,
            "qtyFood": 6,
            "qtyMedication": 0,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 01:12:21",
            "updated_at": "2019-07-30 01:12:21"
        },
        {
            "qtyWater": 4,
            "qtyFood": 1,
            "qtyMedication": 7,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 01:12:31",
            "updated_at": "2019-07-30 01:12:31"
        },
        {
            "qtyWater": 2,
            "qtyFood": 10,
            "qtyMedication": 10,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 01:15:14",
            "updated_at": "2019-07-30 01:15:14"
        },
        {
            "qtyWater": 4,
            "qtyFood": 6,
            "qtyMedication": 1,
            "qtyAmmo": 4,
            "created_at": "2019-07-30 01:15:49",
            "updated_at": "2019-07-30 01:15:49"
        },
        {
            "qtyWater": 3,
            "qtyFood": 3,
            "qtyMedication": 8,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:23:11",
            "updated_at": "2019-07-30 01:23:11"
        },
        {
            "qtyWater": 10,
            "qtyFood": 9,
            "qtyMedication": 2,
            "qtyAmmo": 3,
            "created_at": "2019-07-30 01:23:56",
            "updated_at": "2019-07-30 01:23:56"
        },
        {
            "qtyWater": 1,
            "qtyFood": 9,
            "qtyMedication": 6,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 01:24:18",
            "updated_at": "2019-07-30 01:24:18"
        },
        {
            "qtyWater": 3,
            "qtyFood": 10,
            "qtyMedication": 8,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:25:38",
            "updated_at": "2019-07-30 01:25:38"
        },
        {
            "qtyWater": 4,
            "qtyFood": 3,
            "qtyMedication": 0,
            "qtyAmmo": 0,
            "created_at": "2019-07-30 01:26:30",
            "updated_at": "2019-07-30 01:26:30"
        },
        {
            "qtyWater": 9,
            "qtyFood": 3,
            "qtyMedication": 10,
            "qtyAmmo": 3,
            "created_at": "2019-07-30 01:29:43",
            "updated_at": "2019-07-30 01:29:43"
        },
        {
            "qtyWater": 10,
            "qtyFood": 3,
            "qtyMedication": 0,
            "qtyAmmo": 6,
            "created_at": "2019-07-30 01:31:32",
            "updated_at": "2019-07-30 01:31:32"
        },
        {
            "qtyWater": 10,
            "qtyFood": 3,
            "qtyMedication": 10,
            "qtyAmmo": 7,
            "created_at": "2019-07-30 01:31:54",
            "updated_at": "2019-07-30 01:31:54"
        },
        {
            "qtyWater": 10,
            "qtyFood": 9,
            "qtyMedication": 7,
            "qtyAmmo": 8,
            "created_at": "2019-07-30 01:33:41",
            "updated_at": "2019-07-30 01:33:41"
        },
        {
            "qtyWater": 5,
            "qtyFood": 1,
            "qtyMedication": 10,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:38:06",
            "updated_at": "2019-07-30 01:38:06"
        },
        {
            "qtyWater": 6,
            "qtyFood": 1,
            "qtyMedication": 10,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:39:35",
            "updated_at": "2019-07-30 01:39:35"
        },
        {
            "qtyWater": 4,
            "qtyFood": 5,
            "qtyMedication": 9,
            "qtyAmmo": 5,
            "created_at": "2019-07-30 01:40:10",
            "updated_at": "2019-07-30 01:40:10"
        },
        {
            "qtyWater": 4,
            "qtyFood": 1,
            "qtyMedication": 2,
            "qtyAmmo": 5,
            "created_at": "2019-07-30 01:41:31",
            "updated_at": "2019-07-30 01:41:31"
        },
        {
            "qtyWater": 9,
            "qtyFood": 7,
            "qtyMedication": 0,
            "qtyAmmo": 5,
            "created_at": "2019-07-30 01:45:32",
            "updated_at": "2019-07-30 01:45:32"
        },
        {
            "qtyWater": 0,
            "qtyFood": 9,
            "qtyMedication": 7,
            "qtyAmmo": 9,
            "created_at": "2019-07-30 01:46:22",
            "updated_at": "2019-07-30 01:46:22"
        },
        {
            "qtyWater": 5,
            "qtyFood": 6,
            "qtyMedication": 2,
            "qtyAmmo": 0,
            "created_at": "2019-07-30 01:48:19",
            "updated_at": "2019-07-30 01:48:19"
        },
        {
            "qtyWater": 1,
            "qtyFood": 5,
            "qtyMedication": 3,
            "qtyAmmo": 8,
            "created_at": "2019-07-30 01:50:49",
            "updated_at": "2019-07-30 01:50:49"
        },
        {
            "qtyWater": 1,
            "qtyFood": 8,
            "qtyMedication": 5,
            "qtyAmmo": 8,
            "created_at": "2019-07-30 01:51:48",
            "updated_at": "2019-07-30 01:51:48"
        },
        {
            "qtyWater": 7,
            "qtyFood": 2,
            "qtyMedication": 3,
            "qtyAmmo": 4,
            "created_at": "2019-07-30 01:52:13",
            "updated_at": "2019-07-30 01:52:13"
        },
        {
            "qtyWater": 6,
            "qtyFood": 7,
            "qtyMedication": 0,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 01:53:11",
            "updated_at": "2019-07-30 01:53:11"
        },
        {
            "qtyWater": 2,
            "qtyFood": 4,
            "qtyMedication": 8,
            "qtyAmmo": 2,
            "created_at": "2019-07-30 01:53:33",
            "updated_at": "2019-07-30 01:53:33"
        }
    ]
}
```

### HTTP Request
`GET api/inventories`


<!-- END_fa4326bcefe52d47c9643ed87fc5f289 -->

<!-- START_d6a3cbf4bb9dfeed98146bbb547a564c -->
## Calculate average item per Survivor

> Example request:

```bash
curl -X GET -G "http://localhost/api/reports/averageItems" 
```

```javascript
const url = new URL("http://localhost/api/reports/averageItems");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "avgWater": 6.285714285714286,
    "avgFood": 5.285714285714286,
    "avgMedication": 5.714285714285714,
    "avgAmmo": 6.238095238095238
}
```

### HTTP Request
`GET api/reports/averageItems`


<!-- END_d6a3cbf4bb9dfeed98146bbb547a564c -->

<!-- START_bae3ac810da0d3477cfadeb74a7829cc -->
## Calculate percentage of infected and not infected Survivors, also provides total Suvivors (infected or not)

> Example request:

```bash
curl -X GET -G "http://localhost/api/reports/percentage" 
```

```javascript
const url = new URL("http://localhost/api/reports/percentage");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "infectedPercentage": 0.46153846153846156,
    "notInfectedPercentage": 0.5384615384615384,
    "totalSurvivors": 39
}
```

### HTTP Request
`GET api/reports/percentage`


<!-- END_bae3ac810da0d3477cfadeb74a7829cc -->

<!-- START_a86fd36ac3d52a4a0d7c4a40b178fa83 -->
## Calculate total lost points due to infected Survivors

> Example request:

```bash
curl -X GET -G "http://localhost/api/reports/lostPoints" 
```

```javascript
const url = new URL("http://localhost/api/reports/lostPoints");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
826
```

### HTTP Request
`GET api/reports/lostPoints`


<!-- END_a86fd36ac3d52a4a0d7c4a40b178fa83 -->

<!-- START_b18cf2ba78d8a194674eed5af8e7de25 -->
## Store a newly created Survivor and belonging Inventory resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/survivors" 
```

```javascript
const url = new URL("http://localhost/api/survivors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/survivors`


<!-- END_b18cf2ba78d8a194674eed5af8e7de25 -->

<!-- START_e0b17b103b434e50c40e8c44bba7893e -->
## Trade items between 2 survivors that are NOT infected

> Example request:

```bash
curl -X POST "http://localhost/api/survivors/trade" 
```

```javascript
const url = new URL("http://localhost/api/survivors/trade");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/survivors/trade`


<!-- END_e0b17b103b434e50c40e8c44bba7893e -->

<!-- START_a45334a343779c34e0eddc8c4f625732 -->
## Update the specified Survivor resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/survivors/1" 
```

```javascript
const url = new URL("http://localhost/api/survivors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/survivors/{id}`


<!-- END_a45334a343779c34e0eddc8c4f625732 -->

<!-- START_9674cae9a21762d174599e785fa3746b -->
## Increments the infectedReports attribute to the specified Survivor

> Example request:

```bash
curl -X PUT "http://localhost/api/survivors/report/1" 
```

```javascript
const url = new URL("http://localhost/api/survivors/report/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/survivors/report/{id}`


<!-- END_9674cae9a21762d174599e785fa3746b -->

<!-- START_b30e41e54f64da59198c239fad591c4a -->
## Update the last known location to the specified Survivor

> Example request:

```bash
curl -X PUT "http://localhost/api/survivors/location/1" 
```

```javascript
const url = new URL("http://localhost/api/survivors/location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/survivors/location/{id}`


<!-- END_b30e41e54f64da59198c239fad591c4a -->


