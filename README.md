MassAPI
==========================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6cc20e1e-be9a-44ff-b443-4f38488dc395/big.png)](https://insight.sensiolabs.com/projects/6cc20e1e-be9a-44ff-b443-4f38488dc395)

Tentative de remplacement de [ÉgliseInfo / MessesInfo](http://egliseinfo.catholique.fr) :

- Récupérations des horaires et lieux de culte via leur API GWT
- Création d'une interface plus simple

Schema.org, Platform API, SyliusResourceBundle

Exemple result from MessesInfo API :

```
{"S":[true],"O":[{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1466553600000","celebrationInfoId":"5070449348182016","id":"9155427","time":"09h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":12},"active":true,"localityId":"33\/bordeaux\/saint-seurin","communityId":"bb\/33\/bordeaux-saint-seurin"},"S":"IjkxNTU0Mjci","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450396800000","celebrationInfoId":"5353068900122624","id":"8555263","time":"09h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":13},"active":true,"localityId":"33\/bordeaux\/sainte-croix","communityId":"bb\/33\/bordeaux-le-port"},"S":"Ijg1NTUyNjMi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1441843200000","celebrationInfoId":"6405211736244224","id":"8030116","time":"10h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":15},"active":true,"localityId":"33\/bordeaux\/cathedrale-saint-andre","communityId":"bb\/33\/bordeaux-saint-andre"},"S":"IjgwMzAxMTYi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1439337600000","celebrationInfoId":"6250563553460224","id":"7922431","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":9},"active":true,"localityId":"33\/bordeaux\/saint-bruno","communityId":"bb\/33\/bordeaux-saint-bruno"},"S":"Ijc5MjI0MzEi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1441584000000","celebrationInfoId":"5140896173522944","id":"8019368","time":"10h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":16},"active":true,"localityId":"33\/bordeaux\/saint-louis","communityId":"bb\/33\/bordeaux-saint-louis"},"S":"IjgwMTkzNjgi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1467244800000","celebrationInfoId":"6487464235499520","id":"9198538","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":8},"active":true,"localityId":"33\/bordeaux\/sainte-marie-bastide","communityId":"bb\/33\/la-bastide-floirac"},"S":"IjkxOTg1Mzgi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450396800000","celebrationInfoId":"6125247111626752","id":"8556640","time":"08h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":10},"active":true,"localityId":"33\/bordeaux\/chapelle-la-madeleine","communityId":"bb\/33\/bordeaux-sainte-eulalie"},"S":"Ijg1NTY2NDAi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1464739200000","celebrationInfoId":"6064696645910528","id":"9088795","time":"09h45","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":14},"active":true,"localityId":"33\/bordeaux\/saint-augustin","communityId":"bb\/33\/saint-augustin"},"S":"IjkwODg3OTUi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1465862400000","celebrationInfoId":"5112301807992832","id":"9127708","time":"11h00","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":19},"active":true,"localityId":"33\/bordeaux\/saint-amand","communityId":"bb\/33\/saint-amand-notre-dame-du-salut"},"S":"IjkxMjc3MDgi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1461024000000","celebrationInfoId":"6030453542748160","id":"8970242","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":4},"active":true,"localityId":"33\/bordeaux\/notre-dame-de-salut","communityId":"bb\/33\/saint-amand-notre-dame-du-salut"},"S":"Ijg5NzAyNDIi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1450396800000","celebrationInfoId":"5636440104894464","id":"8555632","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":6},"active":true,"localityId":"33\/bordeaux\/saint-pierre","communityId":"bb\/33\/bordeaux-le-port"},"S":"Ijg1NTU2MzIi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450396800000","celebrationInfoId":"5714953382133760","id":"8557321","time":"09h00","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":11},"active":true,"localityId":"33\/bordeaux\/saint-jean-belcier","communityId":"bb\/33\/bordeaux-sacre-c-ur"},"S":"Ijg1NTczMjEi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450396800000","celebrationInfoId":"6422997262925824","id":"8556811","time":"11h00","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":18},"active":true,"localityId":"33\/bordeaux\/trinite","communityId":"bb\/33\/bordeaux-nord"},"S":"Ijg1NTY4MTEi","O":"UPDATE"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1467244800000","celebrationInfoId":"4508316998828032","id":"9202534","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":5},"active":true,"localityId":"33\/bordeaux\/saint-victor","communityId":"bb\/33\/bordeaux-saint-victor"},"S":"IjkyMDI1MzQi","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Boulevards","communityType":"Paroisse","networkId":"bb","zipcode":"33200","community":"Saint Amand Notre Dame du Salut","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/notre-dame-de-salut","picture":"http:\/\/lh4.ggpht.com\/-AnJevcEYZo8lWjvfgMED8CZ7IUl-SpQ75Y5u4hTQtaKVPesHO3TSK_C1UQSMe9GHdH_0WVaIBwI5jkBoMHl6EjHSijIkb44AoTvr6A3=s85","address":"1 rue Amélie","name":"Notre Dame de Salut","sectorId":"bb\/bordeaux-boulevards","sectorType":"Secteur","longitude":-0.6025214,"latitude":44.8442522,"communityId":"bb\/33\/saint-amand-notre-dame-du-salut"},"R":"2","Y":4},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450310400000","celebrationInfoId":"5811064549670912","id":"8545672","time":"10h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":2},"active":true,"localityId":"33\/bordeaux\/sacre-coeur","communityId":"bb\/33\/bordeaux-sacre-c-ur"},"S":"Ijg1NDU2NzIi","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint Ferdinand","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-ferdinand","picture":"","address":"8 rue Croix de Seguey","name":"Saint Ferdinand","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5896439,"latitude":44.8515317,"communityId":"bb\/33\/bordeaux-saint-ferdinand"},"R":"2","Y":3},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1450656000000","celebrationInfoId":"6619635092815872","id":"8572820","time":"10h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":3},"active":true,"localityId":"33\/bordeaux\/saint-ferdinand","communityId":"bb\/33\/bordeaux-saint-ferdinand"},"S":"Ijg1NzI4MjAi","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33800","community":"Bordeaux Sacré Cœur","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/sacre-coeur","picture":"","address":"Place du Cardinal Donnet","name":"Sacré Coeur","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5632888,"latitude":44.8222685,"communityId":"bb\/33\/bordeaux-sacre-c-ur"},"R":"2","Y":2},{"T":"3IoPEv_hwxXTDoK6CtXV0kkHtJs=","P":{"limitLocalities":100,"limit":20,"queryCelebration":".FR 33","start":0,"query":".fr 33 Bordeaux","listCelebrationTime":[{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg2NzY5NDki"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NzI3Njgi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg5NzAyNDIi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjkyMDI1MzQi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NTU2MzIi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg2ODQ5OTEi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjkxOTg1Mzgi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijc5MjI0MzEi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NTY2NDAi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NTczMjEi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjkxNTU0Mjci"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NTUyNjMi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjkwODg3OTUi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NDU2NzIi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NzI4MjAi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjgwMzAxMTYi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjgwMTkzNjgi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg2NzgzNDki"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"Ijg1NTY4MTEi"},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","S":"IjkxMjc3MDgi"}],"sizeLocalities":37,"type":2,"startLocalities":0,"size":20},"R":"2","Y":1},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Rive Droite","communityType":"Paroisse","networkId":"bb","zipcode":"33370","community":"Artigues","temporary":false,"type":"eglise","city":"ARTIGUES PRES BORDEAUX","id":"33\/artigues-pres-bordeaux\/saint-seurin","picture":"","address":"","name":"Saint Seurin","sectorId":"bb\/bordeaux-rive-droite","sectorType":"Secteur","longitude":-0.4953282,"latitude":44.8575408,"communityId":"bb\/33\/artigues"},"R":"2","Y":7},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33800","community":"Bordeaux Sainte Geneviève","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/sainte-genevieve","picture":"","address":"Rue Bertrand de Goth","name":"Sainte Geneviève","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5775708,"latitude":44.8201789,"communityId":"bb\/33\/bordeaux-sainte-genevieve"},"R":"2","Y":17},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Rive Droite","communityType":"Secteur","networkId":"bb","zipcode":"33100","community":"La Bastide Floirac (Secteur Pastoral La Bastide-Floirac)","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/sainte-marie-bastide","picture":"http:\/\/lh5.ggpht.com\/5aSg57mkmP7eV_CHVbmoZMQcKb-HC5JXJ5Kr_m-rPMy9UDYDGrcpKQuhRU7PdD10dQc25ZvXH8W12btvZ1CdEYM=s85","address":"60 avenue Thiers","name":"Sainte-Marie de La Bastide","sectorId":"bb\/bordeaux-rive-droite","sectorType":"Secteur","longitude":-0.5490559,"latitude":44.846985,"communityId":"bb\/33\/la-bastide-floirac"},"R":"2","Y":8},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint Louis","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-louis","picture":"","address":"51, rue Notre-Dame","name":"Saint Louis","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5714364,"latitude":44.8515814,"communityId":"bb\/33\/bordeaux-saint-louis"},"R":"2","Y":16},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-17","timeType":0,"visitor":false,"updateDate":"1453766400000","celebrationInfoId":"4670585711886336","id":"8678349","time":"10h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":17},"active":true,"localityId":"33\/bordeaux\/sainte-genevieve","communityId":"bb\/33\/bordeaux-sainte-genevieve"},"S":"Ijg2NzgzNDki","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"secteur pastoral Notre-Dame des Anges, St Victor, Ste Jeanne d\'Arc","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint Victor","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-victor","picture":"","address":"144 rue Mouneyra","name":"Saint Victor","sectorId":"bb\/33\/secteur-pastoral-notre-dame-des-anges-st-victor-ste-jeanne-d-arc","sectorType":"Secteur","longitude":-0.5882843,"latitude":44.829838,"communityId":"bb\/33\/bordeaux-saint-victor"},"R":"2","Y":5},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint André","temporary":false,"type":"cathedrale","city":"BORDEAUX","id":"33\/bordeaux\/cathedrale-saint-andre","picture":"","address":"Place Pey-Berland","name":"Cathédrale Saint André","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5777064,"latitude":44.8379962,"communityId":"bb\/33\/bordeaux-saint-andre"},"R":"2","Y":15},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Secteur","networkId":"bb","zipcode":"33800","community":"Bordeaux le Port","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-pierre","picture":"","address":"Place Saint Pierre","name":"Saint Pierre","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5706739,"latitude":44.8400311,"communityId":"bb\/33\/bordeaux-le-port"},"R":"2","Y":6},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Boulevards","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Saint Augustin","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-augustin","picture":"http:\/\/lh4.ggpht.com\/HLuU74YmS1JpyFdxH2Et6o_yH3677go3tn68uF5dfydVBGmYJy3v3dteb3tH7WvJlbHo15Qar4TZKttrHH-PorvgGkHMlTkWq0zCthsk=s85","address":"Place St-Augustin","name":"Saint Augustin","sectorId":"bb\/bordeaux-boulevards","sectorType":"Secteur","longitude":-0.6103677,"latitude":44.8324223,"communityId":"bb\/33\/saint-augustin"},"R":"2","Y":14},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint Bruno","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-bruno","picture":"","address":"Rue François de Sourdis (face au cimetière de la C","name":"Saint Bruno","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.587269,"latitude":44.8350088,"communityId":"bb\/33\/bordeaux-saint-bruno"},"R":"2","Y":9},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Boulevards","communityType":"Paroisse","networkId":"bb","zipcode":"33200","community":"Saint Amand Notre Dame du Salut","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-amand","picture":"","address":"Avenue Louis Barthou","name":"Saint Amand","sectorId":"bb\/bordeaux-boulevards","sectorType":"Secteur","longitude":-0.6127961,"latitude":44.8521988,"communityId":"bb\/33\/saint-amand-notre-dame-du-salut"},"R":"2","Y":19},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Boulevards","communityType":"Paroisse","networkId":"bb","zipcode":"33300","community":"Bordeaux Nord","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/trinite","picture":"","address":"Place de l\'Europe (quartier du Grand Parc)","name":"Trinité","sectorId":"bb\/bordeaux-boulevards","sectorType":"Secteur","longitude":-0.554149,"latitude":44.8772685,"communityId":"bb\/33\/bordeaux-nord"},"R":"2","Y":18},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1453939200000","celebrationInfoId":"4613048920702976","id":"8684991","time":"18h30","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":7},"active":true,"localityId":"33\/artigues-pres-bordeaux\/saint-seurin","communityId":"bb\/33\/artigues"},"S":"Ijg2ODQ5OTEi","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Secteur","networkId":"bb","zipcode":"33800","community":"Bordeaux le Port","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/sainte-croix","picture":"","address":"Place Renaudel","name":"Sainte Croix","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5611922,"latitude":44.8312754,"communityId":"bb\/33\/bordeaux-le-port"},"R":"2","Y":13},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1450656000000","celebrationInfoId":"4567622460899328","id":"8572768","time":"18h00","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":3},"active":true,"localityId":"33\/bordeaux\/saint-ferdinand","communityId":"bb\/33\/bordeaux-saint-ferdinand"},"S":"Ijg1NzI3Njgi","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Saint Seurin","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-seurin","picture":"","address":"Place des Martyrs de la Résistance","name":"Saint Seurin","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.584716,"latitude":44.8424697,"communityId":"bb\/33\/bordeaux-saint-seurin"},"R":"2","Y":12},{"T":"ZR8dI6Tok7Bf1jEI7mYYtONMwRY=","V":"MS4w","P":{"tags":[],"valid":true,"recurrenceCategory":1,"networkId":"bb","date":"2016-07-16","timeType":0,"visitor":false,"updateDate":"1453766400000","celebrationInfoId":"6368020876230656","id":"8676949","time":"18h00","source":"egliseinfo","length":"1h00","locality":{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","R":"2","Y":2},"active":true,"localityId":"33\/bordeaux\/sacre-coeur","communityId":"bb\/33\/bordeaux-sacre-c-ur"},"S":"Ijg2NzY5NDki","O":"UPDATE"},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33800","community":"Bordeaux Sacré Cœur","temporary":false,"type":"eglise","city":"BORDEAUX","id":"33\/bordeaux\/saint-jean-belcier","picture":"","address":"Place Ferdinand Buisson","name":"Saint Jean Belcier","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5509692,"latitude":44.8242733,"communityId":"bb\/33\/bordeaux-sacre-c-ur"},"R":"2","Y":11},{"T":"Ohx5Qbp4WvZF7tBrNtsZMRejIyQ=","P":{"region":"fr","sector":"Bordeaux Centre","communityType":"Paroisse","networkId":"bb","zipcode":"33000","community":"Bordeaux Sainte Eulalie","temporary":false,"type":"chapelle","city":"BORDEAUX","id":"33\/bordeaux\/chapelle-la-madeleine","picture":"","address":"24 Cours Pasteur","name":"Chapelle la Madeleine","sectorId":"bb\/bordeaux-centre","sectorType":"Unité pastorale","longitude":-0.5746269,"latitude":44.8345496,"communityId":"bb\/33\/bordeaux-sainte-eulalie"},"R":"2","Y":10}],"I":[{"T":"3IoPEv_hwxXTDoK6CtXV0kkHtJs=","R":"2","Y":1}]}
```

| Country | URL | API Availability |
| --- | --- | --- |
| Afghanistan |  |  |
| Albania |  |  |
| Algeria |  |  |
| Andorra |  |  |
| Angola |  |  |
| Antigua and Barbuda |  |  |
| Argentina |  |  |
| Armenia |  |  |
| Aruba |  |  |
| Australia |  |  |
| Austria |  |  |
| Azerbaijan |  |  |
| Bahamas, The |  |  |
| Bahrain |  |  |
| Bangladesh |  |  |
| Barbados |  |  |
| Belarus |  |  |
| Belgium |  |  |
| Belize |  |  |
| Benin |  |  |
| Bhutan |  |  |
| Bolivia |  |  |
| Bosnia and Herzegovina |  |  |
| Botswana |  |  |
| Brazil |  |  |
| Brunei |  |  |
| Bulgaria | http://www.catholic-bg.org | No |
| Burkina Faso |  |  |
| Burma |  |  |
| Burundi |  |  |
| Cambodia |  |  |
| Cameroon |  |  |
| Canada |  |  |
| Cabo Verde |  |  |
| Central African Republic |  |  |
| Chad |  |  |
| Chile |  |  |
| China |  |  |
| Colombia |  |  |
| Comoros |  |  |
| Congo, Democratic Republic of the |  |  |
| Congo, Republic of the |  |  |
| Costa Rica |  |  |
| Cote d'Ivoire |  |  |
| Croatia |  |  |
| Cuba |  |  |
| Curacao |  |  |
| Cyprus |  |  |
| Czech Republic |  |  |
| Denmark |  |  |
| Djibouti |  |  |
| Dominica |  |  |
| Dominican Republic |  |  |
| East Timor (see Timor-Leste) |  |  |
| Ecuador |  |  |
| Egypt |  |  |
| El Salvador |  |  |
| Equatorial Guinea |  |  |
| Eritrea |  |  |
| Estonia |  |  |
| Ethiopia |  |  |
| Fiji |  |  |
| Finland |  |  |
| France |  |  |
| Gabon |  |  |
| Gambia, The |  |  |
| Georgia |  |  |
| Germany |  |  |
| Ghana |  |  |
| Greece |  |  |
| Grenada |  |  |
| Guatemala |  |  |
| Guinea |  |  |
| Guinea-Bissau |  |  |
| Guyana |  |  |
| Haiti |  |  |
| Holy See |  |  |
| Honduras |  |  |
| Hong Kong |  |  |
| Hungary |  |  |
| Iceland |  |  |
| India |  |  |
| Indonesia |  |  |
| Iran |  |  |
| Iraq |  |  |
| Ireland |  |  |
| Israel |  |  |
| Italy |  |  |
| Jamaica |  |  |
| Japan |  |  |
| Jordan |  |  |
| Kazakhstan |  |  |
| Kenya |  |  |
| Kiribati |  |  |
| Korea, North |  |  |
| Korea, South |  |  |
| Kosovo |  |  |
| Kuwait |  |  |
| Kyrgyzstan |  |  |
| Laos |  |  |
| Latvia |  |  |
| Lebanon |  |  |
| Lesotho |  |  |
| Liberia |  |  |
| Libya |  |  |
| Liechtenstein |  |  |
| Lithuania |  |  |
| Luxembourg |  |  |
| Macau |  |  |
| Macedonia |  |  |
| Madagascar |  |  |
| Malawi |  |  |
| Malaysia |  |  |
| Maldives |  |  |
| Mali |  |  |
| Malta |  |  |
| Marshall Islands |  |  |
| Mauritania |  |  |
| Mauritius |  |  |
| Mexico |  |  |
| Micronesia |  |  |
| Moldova |  |  |
| Monaco |  |  |
| Mongolia |  |  |
| Montenegro |  |  |
| Morocco |  |  |
| Mozambique |  |  |
| Namibia |  |  |
| Nauru |  |  |
| Nepal |  |  |
| Netherlands |  |  |
| New Zealand |  |  |
| Nicaragua |  |  |
| Niger |  |  |
| Nigeria |  |  |
| North Korea |  |  |
| Norway |  |  |
| Oman |  |  |
| Pakistan |  |  |
| Palau |  |  |
| Palestinian Territories |  |  |
| Panama |  |  |
| Papua New Guinea |  |  |
| Paraguay |  |  |
| Peru |  |  |
| Philippines |  |  |
| Poland |  |  |
| Portugal |  |  |
| Qatar |  |  |
| Romania |  |  |
| Russia |  |  |
| Rwanda |  |  |
| Saint Kitts and Nevis |  |  |
| Saint Lucia |  |  |
| Saint Vincent and the Grenadines |  |  |
| Samoa |  |  |
| San Marino |  |  |
| Sao Tome and Principe |  |  |
| Saudi Arabia |  |  |
| Senegal |  |  |
| Serbia |  |  |
| Seychelles |  |  |
| Sierra Leone |  |  |
| Singapore |  |  |
| Sint Maarten |  |  |
| Slovakia |  |  |
| Slovenia |  |  |
| Solomon Islands |  |  |
| Somalia |  |  |
| South Africa |  |  |
| South Korea |  |  |
| South Sudan |  |  |
| Spain |  |  |
| Sri Lanka |  |  |
| Sudan |  |  |
| Suriname |  |  |
| Swaziland |  |  |
| Sweden | http://www.katolskakyrkan.se/catholic-parishes-in-sweden | No |
| Switzerland |  |  |
| Syria |  |  |
| Taiwan |  |  |
| Tajikistan |  |  |
| Tanzania |  |  |
| Thailand |  |  |
| Timor-Leste |  |  |
| Togo |  |  |
| Tonga |  |  |
| Trinidad and Tobago |  |  |
| Tunisia |  |  |
| Turkey |  |  |
| Turkmenistan |  |  |
| Tuvalu |  |  |
| Uganda |  |  |
| Ukraine |  |  |
| United Arab Emirates |  |  |
| United Kingdom |  |  |
| Uruguay |  |  |
| Uzbekistan |  |  |
| Vanuatu |  |  |
| Venezuela |  |  || Afghanistan |  |  |

| Vietnam |  |  |
| Yemen |  |  |
| Zambia |  |  |
| Zimbabwe |  |  |
