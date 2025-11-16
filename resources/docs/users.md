## Steps

1. Go to home page.
2. Click the `users` page.
3. Click the pagination link table in the user table then the query param will be update with value: `/users?page=2`, `/users?page=3`.
4. Click the browser back button, the query param is correct: `/users?page=2` in the browser URL but the table content is not correct! The table content shows data from `/users?page=1` instead of `/users?page=2`. This leads incorrect behaviour in managing state in Single Page Application approach.
