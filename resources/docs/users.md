## Steps

1. Go to home page.
2. Click the `users` page.
3. Click the pagination link table in the user table then the query param will be update with value: `/users?page=2`, `/users?page=3`.
4. Now, click the browser back button, the query param is correct but the value of list of table is not correct. In page `/users?page=2`, the one of data return should be **Nick Owens with role Moderator** but it return **John Doe with role Admin**. This leads incorrect behaviour in managing state in Single Page Application approach.
