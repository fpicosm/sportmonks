# Sportmonks

With this package, you're allowed to use all Sportmonks APIs in a single project.

```php
Sportmonks::football()
Sportmonks::core()
Sportmonks::my()
Sportmonks::odds()
Sportmonks::cricket()
Sportmonks::f1()
```

## Installation

1. Require the package via composer

```shell
composer require fpicosm/sportmonks
```

2. Update your `.env` file adding the variables:

```dotenv
SPORTMONKS_TOKEN=# YOUR_API_TOKEN (required)
SPORTMONKS_TIMEZONE=# Optional. A valid timezone from /v3/core/timezones endpoint (UTC by default)
SPORTMONKS_PER_PAGE=# Optional. Default page size in paginated responses (50 by default)
```

3. Publish the config file

```shell
php artisan vendor:publish --provider="Sportmonks\SportmonksServiceProvider"
```

## APIs 3.0

### Basic usage

#### The `setInclude` option

This option allows to enrich your responses by including related resources in the request, passing them as an array of
strings, or a semicolon-separated string:

```php
Sportmonks::football()
    ->leagues()
    ->setInclude('country', 'sport')
    ->find(8);
```

or

```php
Sportmonks::football()
    ->leagues()
    ->setInclude('country;sport')
    ->find(8);
```

Produces the response:

```json
{
    "data": {
        "id": 8,
        "sport_id": 1,
        "country_id": 462,
        "name": "Premier League",
        "active": true,
        "short_code": "UK PL",
        "image_path": "https://cdn.sportmonks.com/images/soccer/leagues/8/8.png",
        "type": "league",
        "sub_type": "domestic",
        "last_played_at": "2025-03-10 20:00:00",
        "category": 1,
        "has_jerseys": false,
        "country": {
            "id": 462,
            "continent_id": 1,
            "name": "England",
            "official_name": "England",
            "fifa_name": "ENG",
            "iso2": "EN",
            "iso3": "ENG",
            "latitude": "54.56088638305664",
            "longitude": "-2.2125117778778076",
            "borders": [
                "IRL"
            ],
            "image_path": "https://cdn.sportmonks.com/images/countries/png/short/en.png"
        },
        "sport": {
            "id": 1,
            "name": "Football",
            "code": "football"
        }
    }
}
```

You can also get nested relations by using dot notation:

```php
Sportmonks::football()
    ->leagues()
    ->setInclude('country.continent', 'sport')
    ->find(8);
```

```json
{
    "data": {
        "id": 8,
        "sport_id": 1,
        "country_id": 462,
        "name": "Premier League",
        "active": true,
        "short_code": "UK PL",
        "image_path": "https://cdn.sportmonks.com/images/soccer/leagues/8/8.png",
        "type": "league",
        "sub_type": "domestic",
        "last_played_at": "2025-03-10 20:00:00",
        "category": 1,
        "has_jerseys": false,
        "country": {
            "id": 462,
            "continent_id": 1,
            "name": "England",
            "official_name": "England",
            "fifa_name": "ENG",
            "iso2": "EN",
            "iso3": "ENG",
            "latitude": "54.56088638305664",
            "longitude": "-2.2125117778778076",
            "borders": [
                "IRL"
            ],
            "image_path": "https://cdn.sportmonks.com/images/countries/png/short/en.png",
            "continent": {
                "id": 1,
                "name": "Europe",
                "code": "EU"
            }
        },
        "sport": {
            "id": 1,
            "name": "Football",
            "code": "football"
        }
    }
}
```

#### The `setSelect` option

This option allows you to reduce the speed and response size, getting only the specified fields on the given
entities, passing an array of strings or a comma separated string (fields that have relations are always included).

```php
Sportmonks::football()
    ->leagues()
    ->setSelect('name', 'short_code')
    ->find(8);
```

Produces the response:

```json
{
    "data": {
        "name": "Premier League",
        "short_code": "UK PL",
        "id": 8,
        "sport_id": 1,
        "country_id": 462
    }
}
```

You can combine both `setSelect` and `setInclude` options. If you want to select specified fields within relations, you
should use the `relation:field,another_field,...` notation:

```php
Sportmonks::football()
    ->leagues()
    ->setInclude('country:name,iso2', 'country.continent:name', 'sport:code')
    ->select('name')
    ->find(8);
```

```json
{
    "data": {
        "name": "Premier League",
        "id": 8,
        "sport_id": 1,
        "country_id": 462,
        "country": {
            "id": 462,
            "continent_id": 1,
            "name": "England",
            "iso2": "EN",
            "continent": {
                "id": 1,
                "name": "Europe"
            }
        },
        "sport": {
            "id": 1,
            "code": "football"
        }
    }
}
```

If you need extra info, you can check
the [documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/filter-and-select-fields/selecting-fields)

#### The `setFilters` option

This option allows you to filters the results. If you don't know how to use filters in Sportmonks, please see
the [tutorial](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/filter-and-select-fields/filtering).

You can use both static/dynamic filters:

```php
Sportmonks::football()
    ->fixtures()
    ->setFilters([
        'fixtureLeagues' => [564, 8],
        'todayDate',
        'participantSearch' => 'barcelona'
    ])
    ->all();
```

#### The `sortBy` option

By default, all endpoints return the results ordered by id, in ascending direction. With this option, you can sort the
results by the given field, and the given order:

```php
Sportmonks::football()
    ->leagues()
    ->sortBy('name') # ascending by default
    ->all(); 
```

```php
Sportmonks::football()
    ->leagues()
    ->sortBy('name', 'desc')
    ->all();  
```

#### The `getPage` option

Some endpoints return paginated responses. With this option, you can set the page number and the number of items you
want to get:

```php
Sportmonks::core()
    ->countries()
    ->getPage(2) # by default, the value in env('SPORTMONKS_PER_PAGE'), or 50 if not given
    ->all()
```

```php
Sportmonks::core()
    ->countries()
    ->getPage(2, 20) # get only 20 items per page
    ->all()
```

There's also an optional third argument `orderBy` to say if you want the results ordered by id `asc` (by default) or
`desc`.

```php
Sportmonks::core()
    ->countries()
    ->getPage(2, 20, 'desc') # get the second page, 20 items per page, starting from the end
    ->all();
```

You can combine both `sortBy` and `getPage` options. In this case, the third argument in the `getPage` does not have
any effect, as you are sorting the results by the given field:

```php
Sportmonks::core()
    ->countries()
    ->getPage(2, 10, 'desc') // this `desc` has no effect
    ->sortBy('name', 'asc') 
    ->all();
```

### Endpoints

#### Core API

##### Cities

```php
// get all cities
Sportmonks::core()->cities()->all();
```

```php
// get city by id
Sportmonks::core()->cities()->find($cityId);
```

```php
// get cities by search
Sportmonks::core()->cities()->search($name);
```

##### Continents

```php
// get all continents
Sportmonks::core()->continents()->all();
```

```php
// get continent by id
Sportmonks::core()->continents()->find($countryId);
```

##### Countries

```php
// get all countries
Sportmonks::core()->countries()->all();
```

```php
// get country by id
Sportmonks::core()->countries()->find($countryId);
```

```php
// get countries by search
Sportmonks::core()->countries()->search($name);
```

##### Regions

```php
// get all regions
Sportmonks::core()->regions()->all();
```

```php
// get region by id
Sportmonks::core()->regions()->find($regionId);
```

```php
// get regions by search
Sportmonks::core()->regions()->search($name);
```

##### Timezones

```php
// get all supported timezones
Sportmonks::core()->timezones()->all();
```

##### Types

```php
// get all types
Sportmonks::core()->types()->all();
```

```php
// get type by id
Sportmonks::core()->types()->find($typeId);
```

```php
// get types by entity
Sportmonks::core()->types()->byEntities();
```

#### Football API

##### Coaches

```php
// get all coaches
Sportmonks::football()->coaches()->all();
```

```php
// get coach by id
Sportmonks::football()->coaches()->find($coachId);
```

```php
// get coaches by country id
Sportmonks::football()->coaches()->byCountry($countryId);
```

```php
// get coaches by search by name
Sportmonks::football()->coaches()->search($name);
```

```php
// get last updated coaches
Sportmonks::football()->coaches()->lastUpdated();
```

##### Commentaries

```php
// get all commentaries
Sportmonks::football()->commentaries()->all();
```

```php
// get commentaries by fixture id
Sportmonks::football()->commentaries()->byFixture($fixtureId);
```

##### Expected (xG)

```php
// get expected by team
Sportmonks::football()->expected()->byTeam(); 
```

```php
// get expected by player 
Sportmonks::football()->expected()->byPlayer();
```

##### Fixtures

```php
// get all fixtures
Sportmonks::football()->fixtures()->all();
```

```php
// get fixture by id
Sportmonks::football()->fixtures()->find($fixtureId);
```

```php
// get fixtures by multiple ids
Sportmonks::football()->fixtures()->multiple($fixtureIds);
```

```php
// get fixtures by date
Sportmonks::football()->fixtures()->byDate($date);
```

```php
// get fixtures by date range
Sportmonks::football()->fixtures()->byDateRange($from, $to);
```

```php
// get fixtures by date range for team
Sportmonks::football()->fixtures()->byDateRangeForTeam($from, $to, $teamId);
```

```php
// get fixtures by head to head
Sportmonks::football()->fixtures()->h2h($teamId, $rivalId);
```

```php
// get fixtures by search by name
Sportmonks::football()->fixtures()->search($name);
```

```php
// get upcoming fixtures by market id
Sportmonks::football()->fixtures()->upcomingByMarket($marketId);
```

```php
// get upcoming fixtures by tv station id
Sportmonks::football()->fixtures()->upcomingByTvStation($tvStationId);
```

```php
// get past fixtures by tv station id
Sportmonks::football()->fixtures()->pastByTvStation($tvStationId);
```

```php
// get latest updated fixtures
Sportmonks::football()->fixtures()->lastUpdated();
```

##### Leagues

```php
// get all leagues
Sportmonks::football()->leagues()->all();
```

```php
// get league by id
Sportmonks::football()->leagues()->find($leagueId);
```

```php
// get leagues by live
Sportmonks::football()->leagues()->live();
```

```php
// get leagues by fixture date
Sportmonks::football()->leagues()->byFixtureDate($date);
```

```php
// get leagues by country id
Sportmonks::football()->leagues()->byCountry($countryId);
```

```php
// get leagues search by name
Sportmonks::football()->leagues()->search($name);
```

```php
// get all leagues by team id
Sportmonks::football()->leagues()->allByTeam($teamId);
```

```php
// get current leagues by team id
Sportmonks::football()->leagues()->currentByTeam($teamId);
```

##### Livescores

```php
// get inplay livescores
Sportmonks::football()->livescores()->inplay();
```

```php
// get all livescores
Sportmonks::football()->livescores()->all();
```

```php
// get latest updated livescores
Sportmonks::football()->livescores()->lastUpdated();
```

##### News

```php
// get pre-match news
Sportmonks::football()->news()->preMatch()->all();
```

```php
// get pre-match news by season id
Sportmonks::football()->news()->preMatch()->bySeason($seasonId);
```

```php
// get pre-match news for upcoming fixtures
Sportmonks::football()->news()->preMatch()->upcoming();
```

```php
// get post-match news
Sportmonks::football()->news()->postMatch();
```

```php
// get post-match news by season id
Sportmonks::football()->news()->postMatch()->bySeason($seasonId);
```

##### Players

```php
// get all players
Sportmonks::football()->players()->all();
```

```php
// get player by id
Sportmonks::football()->players()->find($playerId);
```

```php
// get players by country id
Sportmonks::football()->players()->byCountry($countryId);
```

```php
// get players by search by name
Sportmonks::football()->players()->search($name);
```

```php
// get last updated players
Sportmonks::football()->players()->lastUpdated();
```

##### Predictions

```php
// get probabilities
Sportmonks::football()->predictions()->all();
```

```php
// get predictability by league id
Sportmonks::football()->predictions()->byLeague($leagueId);
```

```php
// get probabilities by fixture id
Sportmonks::football()->predictions()->byFixture($fixtureId);
```

```php
// get value bets
Sportmonks::football()->predictions()->valueBets()->all();
```

```php
// get value bets by fixture id
Sportmonks::football()->predictions()->valueBets()->byFixture($fixtureId);
```

##### Referees

```php
// get all referees
Sportmonks::football()->referees()->all();
```

```php
// get referee by id
Sportmonks::football()->referees()->find($refereeId);
```

```php
// get referees by country id
Sportmonks::football()->referees()->byCountry($countryId);
```

```php
// get referees by season id
Sportmonks::football()->referees()->bySeason($seasonId);
```

```php
// get referees by search by name
Sportmonks::football()->referees()->search($name);
```

##### Rivals

```php
// get all rivals
Sportmonks::football()->rivals()->all();
```

```php
// get rivals by team id
Sportmonks::football()->rivals()->byTeam($teamId);
```

##### Rounds

```php
// get all rounds
Sportmonks::football()->rounds()->all();
```

```php
// get round by id
Sportmonks::football()->rounds()->find($roundId);
```

```php
// get rounds by season id
Sportmonks::football()->rounds()->bySeason($seasonId);
```

```php
// get rounds by search by name
Sportmonks::football()->rounds()->search($name);
```

##### Schedules

```php
// get schedules by season id
Sportmonks::football()->schedules()->bySeason($seasonId);
```

```php
// get schedules by team id
Sportmonks::football()->schedules()->byTeam($teamId);
```

```php
// get schedules by season id and team id
Sportmonks::football()->schedules()->bySeasonAndTeam($seasonId, $teamId);
```

##### Seasons

```php
// get all seasons
Sportmonks::football()->seasons()->all();
```

```php
// get season by id
Sportmonks::football()->seasons()->find($seasonId);
```

```php
// get seasons by team id
Sportmonks::football()->seasons()->byTeam($teamId);
```

```php
// get seasons by search by name
Sportmonks::football()->seasons()->search($name);
```

##### Squads

```php
// get squad by team id
Sportmonks::football()->squads()->currentByTeam($teamId);
```

```php
// get extended squad by team id
Sportmonks::football()->squads()->extendedByTeam($teamId);
```

```php
// get squad by team and season id
Sportmonks::football()->squads()->bySeasonAndTeam($seasonId, $teamId);
```

##### Stages

```php
// get all stages
Sportmonks::football()->stages()->all();
```

```php
// get stage by id
Sportmonks::football()->stages()->find($stageId);
```

```php
// get stages by season id
Sportmonks::football()->stages()->bySeason($seasonId);
```

```php
// get stages by search by name
Sportmonks::football()->stages()->search($name);
```

##### Standings

```php
// get all standings
Sportmonks::football()->standings()->all();
```

```php
// get standings by season id
Sportmonks::football()->standings()->bySeason($seasonId);
```

```php
// get standing correction by season id
Sportmonks::football()->standings()->correctionBySeason($seasonId);
```

```php
// get standings by round id
Sportmonks::football()->standings()->byRound($roundId);
```

```php
// get live standings by league id
Sportmonks::football()->standings()->liveByLeague($leagueId);
```

##### States

```php
// get all states
Sportmonks::football()->states()->all();
```

```php
// get state by id
Sportmonks::football()->states()->find($stateId);
```

##### Statistics

```php
// get season statistics by participant
Sportmonks::football()->statistics()->byPlayer($playerId);
Sportmonks::football()->statistics()->byTeam($teamId);
Sportmonks::football()->statistics()->byCoach($coachId);
Sportmonks::football()->statistics()->byReferee($refereeId);
```

```php
// get stage statistics by id
Sportmonks::football()->statistics()->byStage($stageId);
```

```php
// get round statistics by id
Sportmonks::football()->statistics()->byRound($roundId);
```

##### Teams

```php
// get all teams
Sportmonks::football()->teams()->all();
```

```php
// get team by id
Sportmonks::football()->teams()->find($teamId);
```

```php
// get teams by country id
Sportmonks::football()->teams()->byCountry($countryId);
```

```php
// get teams by season id
Sportmonks::football()->teams()->bySeason($seasonId);
```

```php
// get teams by search by name
Sportmonks::football()->teams()->search($name);
```

##### Top Scorers

```php
// get top scorers by season id
Sportmonks::football()->topScorers()->bySeason($seasonId);
```

```php
// get top scorers by stage id
Sportmonks::football()->topScorers()->byStage($stageId);
```

##### Transfers

```php
// get all transfers
Sportmonks::football()->transfers()->all();
```

```php
// get transfer by id
Sportmonks::football()->transfers()->find($transferId);
```

```php
// get latest transfers
Sportmonks::football()->transfers()->latest();
```

```php
// get transfers between date range
Sportmonks::football()->transfers()->byDateRange($from, $to);
```

```php
// get transfers by team id
Sportmonks::football()->transfers()->byTeam($teamId);
```

```php
// get transfers by player id
Sportmonks::football()->transfers()->byPlayer($playerId);
```

##### Tv Stations

```php
// get all tv stations
Sportmonks::football()->tvStations()->all();
```

```php
// get tv station by id
Sportmonks::football()->tvStations()->find($tvStationId);
```

```php
// get tv stations by fixture id
Sportmonks::football()->tvStations()->byFixture($fixtureId);
```

##### Venues

```php
// get all venues
Sportmonks::football()->venues()->all();
```

```php
// get venue by id
Sportmonks::football()->venues()->find($venueId);
```

```php
// get venues by season id
Sportmonks::football()->venues()->bySeason($seasonId);
```

```php
// get venues by search by name 
Sportmonks::football()->venues()->search($name);
```

#### Odds API

##### Bookmakers

```php
// get all bookmakers
Sportmonks::odds()->bookmakers()->all();
```

```php
// get premium bookmakers
Sportmonks::odds()->bookmakers()->premium();
```

```php
// get bookmaker by id
Sportmonks::odds()->bookmakers()->find($bookmakerId);
```

```php
// get bookmakers by search
Sportmonks::odds()->bookmakers()->search($name);
```

```php
// get bookmakers by fixture id
Sportmonks::odds()->bookmakers()->byFixture($fixtureId);
```

```php
// get bookmaker event id's by fixture id
Sportmonks::odds()->bookmakers()->eventsByFixture($fixtureId);
```

##### Markets

```php
// get all markets
Sportmonks::odds()->markets()->all();
```

```php
// get premium markets
Sportmonks::odds()->markets()->premium();
```

```php
// get market by id
Sportmonks::odds()->markets()->find($marketId);
```

```php
// get markets by search
Sportmonks::odds()->markets()->search($name);
```

#### My Api

```php
// get all entity filters
Sportmonks::my()->filters();
```

```php
// get my enrichments
Sportmonks::my()->enrichments();
```

```php
// get my resources
Sportmonks::my()->resources();
```

```php
// get my leagues
Sportmonks::my()->leagues();
```

```php
// get my usage
Sportmonks::my()->usage();
```

## Cricket API

### Basic usage

### Endpoints

#### Continents

```php
// get all continents
Sportmonks::cricket()->continents()->all();
```

```php
// get continent by id
Sportmonks::cricket()->continents()->all();
```

#### Countries

```php
// get all 
Sportmonks::cricket()->countries()->all();
```

```php
// get by id 
Sportmonks::cricket()->countries()->find($countryId);
```

#### Leagues

```php
// get all 
Sportmonks::cricket()->leagues()->all();
```

```php
// get by id 
Sportmonks::cricket()->leagues()->find($leagueId);
```

#### Seasons

```php
// get all 
Sportmonks::cricket()->seasons()->all();
```

```php
// get by id 
Sportmonks::cricket()->seasons()->find($seasonId);
```

#### Fixtures

```php
// get all 
Sportmonks::cricket()->fixtures()->all();
```

```php
// get by id 
Sportmonks::cricket()->fixtures()->find($fixtureId);
```

#### Livescores

```php
// get all 
Sportmonks::cricket()->livescores()->all();
```

#### Teams

```php
// get all 
Sportmonks::cricket()->teams()->all();
```

```php
// get by id 
Sportmonks::cricket()->teams()->find($teamId);
```

```php
// get squad by team and season id
Sportmonks::cricket()->teams()->squadBySeason($teamId, $seasonId); 
```

#### Players

```php
// get all 
Sportmonks::cricket()->players()->all();
```

```php
// get by id 
Sportmonks::cricket()->players()->find($playerId);
```

#### Officials

```php
// get all 
Sportmonks::cricket()->officials()->all();
```

```php
// get by id 
Sportmonks::cricket()->officials()->find($officialId);
```

#### Venues

```php
// get all 
Sportmonks::cricket()->venues()->all();
```

```php
// get by id 
Sportmonks::cricket()->venues()->find($venueId);
```

#### Positions

```php
// get all 
Sportmonks::cricket()->positions()->all();
```

```php
// get by id 
Sportmonks::cricket()->positions()->find($positionId);
```

#### Stages

```php
// get all 
Sportmonks::cricket()->stages()->all();
```

```php
// get by id 
Sportmonks::cricket()->stages()->find($stageId);
```

#### Team Rankings

```php
// get all
Sportmonks::cricket()->teamRankings()->global(); 
```

#### Standings

```php
// get standings by season id
Sportmonks::cricket()->standings()->bySeason(); 
```

```php
// get standings by stage id 
Sportmonks::cricket()->standings()->byStage();
```

#### Scores

```php
// get all scores
Sportmonks::cricket()->scores()->all();
```

```php
// get by id 
Sportmonks::cricket()->scores()->find($scoreId);
```
