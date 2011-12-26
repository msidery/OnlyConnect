import SimpleHTTPServer
class Server(SimpleHTTPServer.SimpleHTTPRequestHandler):
  def do_POST(self):
    return do_GET()

server = Server()
print dir(server)
