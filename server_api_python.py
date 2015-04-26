import httplib2
import urllib
import base64

data = {'usuario':'testeee', 'email':'teste@teste.com.br.oo', 'password':'1234567'}
body = urllib.urlencode(data)

auth = base64.encodestring( 'mayron' + ':' + '123' )
headers2 = {'Authorization' : 'Basic ' + auth ,
                    'Content-type': 'application/json'
          }


h = httplib2.Http()
resp, content = h.request("https://webservice-mayronceccon.c9.io/api/v1/create", method="GET", body=body, headers=headers2)

print content