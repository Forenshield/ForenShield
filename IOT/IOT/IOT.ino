#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <Adafruit_SSD1306.h>

#include <WiFi.h>
#include <HTTPClient.h>

#define OLED_Address 0x3C
Adafruit_SSD1306 display(128, 64);

#define DHTPIN 19
#define mq 34
#define pir 13
#define buzzer 23
#define DHTTYPE DHT22

int t, h, gasRead, pirData;
String key;

DHT dht(DHTPIN, DHTTYPE);

#define WIFI_SSID "123"
#define WIFI_PASSWORD "123123123"

const char* serverName = "http://192.168.1.179:8002/api/admin/login";
const char* serverName1 = "http://192.168.1.179:8002/api/admin/data1/create";

unsigned long lastTime = 0;
unsigned long timerDelay = 10000;

void initWiFi() {
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Connecting to WiFi ..");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print('.');
    delay(1000);
  }
  Serial.println(WiFi.localIP());
  Serial.println();
}
void setup() {
  Serial.begin(9600);
  dht.begin();
  pinMode(mq, INPUT);
  pinMode(pir, INPUT);
  pinMode(buzzer, OUTPUT);
  digitalWrite(buzzer, LOW);

  display.begin(SSD1306_SWITCHCAPVCC, OLED_Address);
  display.clearDisplay();
  initWiFi();
  getKeyLogin();
  delay(3000);

}

void loop() {
  mqRead();
  dhtRead();
  pirRead();
  Display();

  if ((millis() - lastTime) > timerDelay) {
    sendData();
    lastTime = millis();
  }

}
void dhtRead() {
  delay(1000);
  h = dht.readHumidity();
  t = dht.readTemperature();

  if (isnan(h) || isnan(t)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print(F("%  Temperature: "));
  Serial.print(t);
  Serial.println(F("°C "));

}
void mqRead() {
  gasRead = analogRead(mq);
  gasRead = map(gasRead, 0, 4095, 0, 100);
  Serial.print("gasRead : ");
  Serial.println(gasRead);
}
void pirRead() {
  pirData = digitalRead(pir);
  if (pirData == HIGH) {
    Serial.println("Movement detected.");
    //    digitalWrite(buzzer, HIGH);
    //    delay(1000);
    //    digitalWrite(buzzer, LOW);
  } else {
    Serial.println("Did not detect movement.");
  }
  delay(1000);
}
void Display() {
  display.clearDisplay();
  display.setTextSize(1);
  display.setTextColor(WHITE);
  display.setCursor(10, 0);
  display.println("Forenshield Device");
  display.setCursor(0, 18);
  display.print("Temperature : ");
  display.print(t);
  display.println(" C");
  display.setCursor(0, 28);
  display.print("Humidity : ");
  display.print(h);
  display.println(" %");
  display.setCursor(0, 38);
  display.print("Gas Level : ");
  display.print(gasRead);
  display.println(" %");
  display.setCursor(0, 48);
  display.print("PIR Status : ");
  display.println(pirData);
  display.display();
}
void getKeyLogin() {

  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;
    http.begin(client, serverName);

    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    // Data to send with HTTP POST
    String httpRequestData = "email=admin@gmail.com&password=Admin@123";
    // Send HTTP POST request
    int httpResponseCode = http.POST(httpRequestData);

    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    key = http.getString();
    Serial.println(key);

    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
}
void sendData() {
  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    http.begin(client, serverName1);

    http.addHeader("Authorization", "Bearer " + key + "");
    http.addHeader("pir", String(pirData));
    http.addHeader("temperature", String(t));
    http.addHeader("humidity", String(h));
    http.addHeader("gas", String(gasRead));

    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      String payload = http.getString();
      Serial.println(payload);
    }
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
}
