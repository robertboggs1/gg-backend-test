# gg-backend-test
Note, I didnt get a chance to finish debugging an error where the login form selector seemed to not select the element thus the login submission action goes through.

- Ok, yeah it was a simple fix, looked at it after taking a break. The listening function just needed to wait until the document finished loading, adding a document.ready would fix it.
