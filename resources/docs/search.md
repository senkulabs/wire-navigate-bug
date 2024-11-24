## Steps

1. Go to home page.
2. Click the `search` page.
3. Type search `hello` and the query param is show with value `/search?query=hello`.
4. Type search again with value `world` and the query param is updated with value `/search?query=world`.
5. Now, click the browser back button, the query param is correct but the value of text box and result text in `search` page is not sync with query param. This leads incorrect behaviour in managing state in Single Page Application approach.
