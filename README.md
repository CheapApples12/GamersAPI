[![GamersAPI Logo][logo]](https://cheapapples12.github.io/GamersAPI/)


## Using the APIs
This section contains the API's, example uses and example responses. All response content-type's are JSON. Here are the API's we currently offer:

[KiK Messenger API](#kik-api)

[Rockstar Games Socialclub API](#rockstar-games-socialclub-crew-api)


---


#### KiK API
KiK Messenger does not offer a user information API. We rely solely on people doing the right thing, and not abusing the API. KiK is a popular choice of messaging app for gaming communities; it's a fast, secure, convenient messenger, and it's all-round pretty awesome.

Our API allows you to get a user's display name, KiK avatar and a secure (https) version of the user's KiK avatar.

The API can be accessed via:
```
https://gamersapi.herokuapp.com/apis/kik/{kik username}
```

Example Use:
```
https://gamersapi.herokuapp.com/apis/kik/cheapapples12
```

Example Response:
```json
{"username":"cheapapples12", "display_name":"CheapApples12 [Vice President]", "avatar":"http://profilepics.cf.kik.com/Fh8jwxDfbzVwNOSFTN67fDmPGn4/orig.jpg", "avatar_ssl":"https://gamersapi.herokuapp.com/apis/kik_https/cheapapples12?cache=1"}
```

---

#### Rockstar Games Socialclub Crew API
Rockstar Games does not offer any way whatsoever to retrieve any information about any crew on the socialclub. We developed the Rockstar Games Socialclub Crew API so that crews can retrieve crew names and hopefully one day, crew avatar images from a Socialclub Crew URL.

We ask that you also use this API modestly, as we rely on a good community relationship with Rockstar Games in order to make this API work.

At the moment, our API allows you to retrieve a crew name from a Socialclub URL.

The API can be accessed via:
```
https://gamersapi.herokuapp.com/apis/rsg/{full socialclub url}
```

Example Use:
```
https://gamersapi.herokuapp.com/apis/rsg/https://socialclub.rockstargames.com/crew/los_santos_police_xb
```

Example Response:
```json
{"crew_name":"Los Santos Police XB"}
```

## Downloading the APIs
GamersAPI is Open Source, which means you're free to use the API's, as long as you do not remove the attribution statements from the top of the API's, and as long as you don't attempt to market the API as your own, or attempt to charge money for people to use the API's.

GamersAPI does not need composer, or any third-party software. The only requirements are as follows:

 - PHP => 5.0
 - allow_url_fopen allowed

If you do not want to download the api's, you are welcome to use our [Heroku hosted API's](#using-the-apis). If you choose to download the APIs, **you must not remove or change the copyright statement at the top of the .php files**.


## Additional APIs
If you have a project that requires information from a website or application that does not have an API, feel free to make a request, and I'll be sure to have a crack at it. Any API's I develop that can be considered game-related will be added here. If you want to suggest an API, [open a new issue](https://github.com/CheapApples12/GamersAPI/issues/new).

[logo]: https://raw.githubusercontent.com/CheapApples12/GamersAPI/master/assets/images/header.png "GamersAPI Logo"
