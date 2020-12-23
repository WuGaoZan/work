#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
ESP8266WebServer server(80);
int id=1;
int w=10;
void MyWeb()
{
  server.send(200,"text/html","<html><body><a href='http://163.23.180.231/~711317/receive.php?id="+String(id)+"&w="+String(w)+"'>send</a></body></html>");
}
void error()
{
  server.send(404,"text/plain","error");
}
void setup()
{
  ESP.wdtDisable();
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.begin("if305", "sivs1234");
  Serial.print("WiFi Connecting");
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  if (MDNS.begin("esp8266"))
  {
    Serial.println("MDNS responder started");
  }
  //server.on("/index.html",index);
  server.on("/",MyWeb);
  server.onNotFound(error);
  Serial.print("WiFi:");
  Serial.println(WiFi.localIP());
  server.begin();
  Serial.println("Running...");
}
void loop()
{
  ESP.wdtFeed();
  server.handleClient();
  MDNS.update();
  //delay(1000);
}
