import base64
import httplib2
import urllib
 
h = httplib2.Http()
auth = base64.encodestring( 'mayron' + ':' + '123' )

data = {'name': 'fred', 'address': '123 shady lane'}
body = urllib.urlencode(data)

body2 = urllib.urlencode({'usuario':'testeee', 'email':'teste@teste.com.br.oo', 'password':'1234567'})

headers2 = {'Authorization' : 'Basic ' + auth ,
                    'Content-type': 'application/json'
          }

url = 'https://webservice-mayronceccon.c9.io/api/v1'

resp, content = h.request(url, method='POST', body=body2, headers=headers2)

print(content)