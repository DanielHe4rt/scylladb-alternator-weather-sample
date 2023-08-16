# ScyllaDB Alternator Forecast Sample

This example how ScyllaDB Alternator works with an Weather Forecast modeling sample.

1. **DynamoDB Table:**
   Let's create a table called "forecast" to store data regarding the weather in some Brazilian capitals.  
   We're going to use the 'city name' as the Partition Key and the forecast date as Sort/Clustering Key.

    - **Partition Key (Chave de Partição):** city_name (String)
    - **Sort Key (Chave de Classificação):** ts (String)
    - **Other Attributes:**
        - temperature Map - Float<min, max, avg>.
        - uvi (Ultra Violet Index) - Int
        - climate_conditions - String

2. **Exemplo de Dados:**

   Vamos supor que queiramos armazenar informações de clima para as cidades de "São Paulo" e "Rio de Janeiro". Aqui está
   um exemplo de como os dados poderiam ser armazenados na tabela:

| City           | Date                | Temperature                           | uvi | climate_conditions |
|----------------|---------------------|---------------------------------------|-----|--------------------|
| São Paulo      | 2023-08-14 12:00:00 | {"min": 28.5, "max": 31.5: "avg: 123} | 65  | Sunny              |
| São Paulo      | 2023-08-14 18:00:00 | {"min": 28.5, "max": 31.5: "avg: 123} | 70  | Raining            |
| Rio de Janeiro | 2023-08-14 12:00:00 | {"min": 28.5, "max": 31.5: "avg: 123} | 58  | Sunny              |

3. **Possible Operations:**

    - Insert new forecast data of a city on a specific date;
    - Update a specific forecast data by city and date;
    - Search information based on a specific city or date;
    - Delete information of a entire city.
