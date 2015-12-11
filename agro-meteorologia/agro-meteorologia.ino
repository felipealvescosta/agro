/*
  Projeto Agro Meteorology
  Ceará faz Ciência
  Sertão Central

  Desenvolverdor Felipe Alves;

*/


#include "DHT.h"
 
#define DHTPIN A1 // pino que estamos conectado
#define DHTTYPE DHT11 // DHT 11
 
// Conecte pino 1 do sensor (esquerda) ao +5V
// Conecte pino 2 do sensor ao pino de dados definido em seu Arduino
// Conecte pino 4 do sensor ao GND
// Conecte o resistor de 10K entre pin 2 (dados) 
// e ao pino 1 (VCC) do sensor
DHT dht(DHTPIN, DHTTYPE);

int ldr = 0;

int valorLDR = 0;


void setup() 
{
  Serial.begin(9600);
  //Serial.println("DHTxx test -  Iniciando!");
  dht.begin();
}
 
void loop() 
{
  
  // A leitura da temperatura e umidade pode levar 250ms!
  // O atraso do sensor pode chegar a 2 segundos.
  int h = dht.readHumidity();
  int t = dht.readTemperature();

  valorLDR = analogRead(ldr);
  
  // testa se retorno é valido, caso contrário algo está errado.
  if (isnan(t) || isnan(h)) 
  {
    Serial.println("não pode ler o DHT");
  } 
  else
  {
    // leitura da humidade
    Serial.print(h);
    //impressão para os "dois pontos" do explode no php
    Serial.print(":");
    // leitura da temperatuda
    Serial.print(t);
    //impressão para os "dois pontos" do explode no php
    Serial.print(":");
    Serial.print(valorLDR);  
    delay(5000);
    
    
  }
}
