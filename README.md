[![GamersAPI Logo][logo]](https://cheapapples12.github.io/GamersAPI/)


## Using the APIs
This section contains the API's, example uses and example responses. All response content-type's are JSON. Here are the API's we currently offer:

[KiK Messenger API](#kik-api)

[Rockstar Games Socialclub API](#rockstar-games-socialclub-crew-api)

[PSN Avatar API](#psn-avatar-api)


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

---

#### Rockstar Games Socialclub Button
Twitter-style Add Friend buttons for the Rockstar Games Socialclub!

The API can be accessed by embedding the following into a webpage:
```html
<a href="https://socialclub.rockstargames.com/member/{socialclub username}" class="rsg_btn" data-compare-lsgov="true">Add @{socialclub username}</a><script async src="//gamersapi.herokuapp.com/rsg/script.js" charset="utf-8"></script>
```

Example Use:
```
<a href="https://socialclub.rockstargames.com/member/cheapapples12" class="rsg_btn" data-compare-lsgov="true">Add @CheapApples12</a><script async src="//gamersapi.herokuapp.com/rsg/script.js" charset="utf-8"></script>
```

Example Response:

![Add CheapApples12](data:image/png;base64,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"Add CheapApples12")

<a href="https://socialclub.rockstargames.com/member/cheapapples12" class="rsg_btn" data-compare-lsgov="true">Add @CheapApples12</a><script async src="//gamersapi.herokuapp.com/rsg/script.js" charset="utf-8"></script>

---

#### PSN Avatar API
Sony do not allow users to retrieve Playstation Avatars via any public API endpoint, so we made one for them. The PSN Avatar API is a JSON API.

The API can be accessed via:
```
https://gamersapi.herokuapp.com/apis/psn/{psn id}
```

Example Use:
```
https://gamersapi.herokuapp.com/apis/psn/yowmudder
```

Example Response:
```json
{"avatar":"https://static-resource.np.community.playstation.net/avatar_m/WWS_A/A0002_m.png"}
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
