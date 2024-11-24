# Wire Navigate Bug

Livewire `wire:navigate` is good but not perfect, right now. Let me show you what I mean by create this repo bug.

## Steps

### Step 1

1. Go to home page.
2. Click the `search` page.
3. Type search `hello` and the query param is show with value `/search?query=hello`.
4. Type search again with value `world` and the query param is updated with value `/search?query=world`.
5. Now, click the browser back button, the query param is correct but the value of text box and result text in `search` page is not sync with query param. This leads incorrect behaviour in managing state in Single Page Application approach.

### Step 2

1. Go to home page.
2. Click the `users` page.
3. Click the pagination link table in the user table then the query param will be update with value: `/users?page=2`, `/users?page=3`.
4. Now, click the browser back button, the query param is correct but the value of list of table is not correct. In page `/users?page=2`, the one of data return should be **Nick Owens with role Moderator** but it return **John Doe with role Admin**. This leads incorrect behaviour in managing state in Single Page Application approach.

## Side Note

I see Livewire use `history.replaceState()` instead of `history.pushState()` to storing URL and query param in history. I don't know why Livewire take this approach.

> By default, Livewire uses history.replaceState() to modify the URL instead of history.pushState(). This means that when Livewire updates the query string, it modifies the current entry in the browser's history state instead of adding a new one.
