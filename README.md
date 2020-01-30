# SimplayMusic

## Description

SimplayMusic is a very basic music collection web-app made with Laravel Framework.

## Features Details

**Login**

- Basic login page with the fields `username` and `password`
- Once logged in the user should be able to access all internal pages of the music app
    - If a not-logged in user tries to access any internal page he should be redirected to the login page
- After a successful login the user should be redirected to the `Artists list` page
- A failed login attempt will send the user back to the login page with the error: `Sorry, we couldn't find an account with this username. Please check you're using the right username and try again.`

**Artists**

- 3 pages for users list, add and edit artists.
- Each artist contain the following fields:
    - `Artist name`
    - `Twitter handle`

**Albums**

- 3 pages for users list, add and edit albums.
- Each album contain the following fields:
    - `Artist` let user select from the list of existing artists
    - `Album name`
    - `Year`
