# Sportmonks

## Installation

1. Require the package via Composer:

```shell
composer require fpicosm/sportmonks
```

2. Update your `.env` file adding the Sportmonks variables:

```php
SPORTMONKS_TOKEN=# YOUR_API_TOKEN
SPORTMONKS_TIMEZONE=# Optional. UTC by default
SPORTMONKS_PER_PAGE=# Optional. 50 by default
```

3. Publish the config file:

```shell
php artisan vendor:publish --provider="Sportmonks\SportmonksServiceProvider"
```

## APIs 3.0

### Basic Usage

#### The `setInclude` option

This option allows you to enrich your responses by including related resources in the request. You can pass an array of
strings of a semicolon separated string.

```php
Sportmonks::football()
    ->fixtures()
    ->setInclude('round', 'stage', 'group', 'lineups')
    ->all();
```

```php
Sportmonks::football()
    ->fixtures()
    ->setInclude('round;stage;group;lineups')
    ->all();
```

You can also get nested relations using dot notation:

```php
Sportmonks::football()
    ->fixtures()
    ->setInclude('lineups.player.nationality', 'round.stage')
    ->all();
```

#### The `setSelect` option

This allows you to reduce responses speed and size, filtering them by getting only the specified fields on the given
entities, passing an array of strings or a comma separated string:

```php
Sportmonks::football()
    ->leagues()
    ->setSelect('name', 'short_code')
    ->all();
```

```php
Sportmonks::football()
    ->leagues()
    ->setSelect('name,short_code')
    ->all();
```

This request will produce the following response. Note that fields with relations are always added, like `id`,
`sport_id`, `country_id`...

```json 
{
    "data": [
        {
            "name": "Premier League",
            "short_code": "UK PL",
            "id": 8,
            "sport_id": 1,
            "country_id": 462
        }
    ]
}
```

In case you want to select specific fields within relations, you should use the `relation:field,other_field` notation:

```php
Sportmonks::football()
    ->leagues()
    ->setSelect('name', 'short_code')
    ->setInclude('seasons:name,starting_at,ending_at')
    ->all();
```

#### The `setFilters` option

This allows you to filters the results. There are two types of filters (please, check
out [documentation](https://docs.sportmonks.com/football/api/request-options/filtering) or the `Static filters` and
`Dynamic filters` tabs in the request pages for more information).

##### Static filters

```php
Sportmonks::football()
    ->fixtures()
    ->setFilters(['todayDate', 'idAfter' => 500])  
    ->all(); 
```

##### Dynamic filters

```php
Sportmonks::football()
    ->fixtures()
    ->setSelect('name', 'state')
    ->setFilters(['todayDate', 'fixtureStates' => [1, 2]])  
    ->all(); 
```

#### The `sortBy` option

This allows you to sort the results by the given field, and the given order:

```php
Sportmonks::football()->leagues()->sortBy('name')->all(); // order is 'asc' by default
Sportmonks::football()->leagues()->sortBy('name', 'desc')->all();
```

#### The `setPage` option

This allows you to get the given page and optionally the number of rows (50 by default), and ordering results by the
given field (`id` by default):

```php
// gets the second page
Sportmonks::football()->players()->setPage(2)->all();
``` 

```php
// gets the second page, and returns 20 items
Sportmonks::football()->players()->setPage(2, 20)->all(); 
```

```php
// gets the second page, and returns 20 items, ordering results by the 'name' field
Sportmonks::football()->players()->setPage(2, 20, 'name')->all(); 
```

### Core Api

#### Cities

```php
// get all cities
Sportmonks::core()->cities()->all();
```

```php
// get city by id
Sportmonks::core()->cities()->find($cityId);
```

```php
// search cities by name
Sportmonks::core()->cities()->search($name);
```

#### Continents

```php
// get all continents
Sportmonks::core()->continents()->all();
```

```php
// get continent by id
Sportmonks::core()->continents()->find($continentId);
``` 

#### Countries

```php
// get all countries
Sportmonks::core()->countries()->all();
```

```php
// get country by id
Sportmonks::core()->countries()->find($countryId);
```

```php
// search countries by name
Sportmonks::core()->countries()->search($name);
```

#### Regions

```php
// get all regions
Sportmonks::core()->regions()->all();
```

```php
// get region by id
Sportmonks::core()->regions()->find($regionId);
```

```php
// search regions by name
Sportmonks::core()->regions()->search($name);
```

#### Timezones

```php
// get all timezones
Sportmonks::core()->timezones()->all();
```

#### Types

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
Sportmonks::core()->types()->byEntity();
```

### Football Api

#### Coaches

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
// search coaches by name
Sportmonks::football()->coaches()->search($name);
```

```php
// get last updated coaches
Sportmonks::football()->coaches()->latest();
```

#### Commentaries

```php
// get all commentaries
Sportmonks::football()->commentaries()->all();
```

```php
// get commentaries by fixture id
Sportmonks::football()->commentaries()->byFixture($fixtureId);
```

#### Expected (xG)

```php
// get expected by team
Sportmonks::football()->expected()->byTeam();
```

```php
// get expected by player
Sportmonks::football()->expected()->byPlayer();
```

#### Fixtures

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
Sportmonks::football()->fixtures()->byDateRange($start, $end);
```

```php
// get fixtures by date range for team
Sportmonks::football()->fixtures()->byDateRangeForTeam($start, $end, $teamId);
```

```php
// get fixtures by head to head
Sportmonks::football()->fixtures()->h2h($firstTeamId, $secondTeamId);
```

```php
// search fixtures by name
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
Sportmonks::football()->fixtures()->latest();
```

#### Leagues

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
// search leagues by name
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

#### Livescores

```php
// get all livescores
Sportmonks::football()->livescores()->all();
```

```php
// get inplay livescores
Sportmonks::football()->livescores()->inplay();
```

```php
// get latest updated livescores
Sportmonks::football()->livescores()->latest();
```

#### News

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
Sportmonks::football()->news()->preMatch()->forUpcomingFixtures();
```

```php
// get post-match news
Sportmonks::football()->news()->postMatch()->all();
```

```php
// get post-match news by season id
Sportmonks::football()->news()->postMatch()->bySeason($seasonId);
```

#### Odds pre-match (standard)

```php
// get all pre-match odds
Sportmonks::football()->odds()->preMatch()->all();
```

```php
// get pre-match odds by fixture id
Sportmonks::football()->odds()->preMatch()->byFixture($fixtureId);
```

```php
// get pre-match odds by fixture id and bookmaker id
Sportmonks::football()->odds()->preMatch()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get pre-match odds by fixture id and market id
Sportmonks::football()->odds()->preMatch()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get last updated pre-match odds
Sportmonks::football()->odds()->preMatch()->latest();
```

#### Odds pre-match (premium)

```php
// get all premium pre-match odds
Sportmonks::football()->odds()->preMatch()->premium()->all();
```

```php
// get premium pre-match odds by fixture id
Sportmonks::football()->odds()->preMatch()->premium()->byFixture($fixtureId);
```

```php
// get premium pre-match odds by fixture id and bookmaker id
Sportmonks::football()->odds()->preMatch()->premium()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get premium pre-match odds by fixture id and market id
Sportmonks::football()->odds()->preMatch()->premium()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get updated premium pre-match odds between time range
Sportmonks::football()->odds()->preMatch()->premium()->updatedBetweenTime($start, $end);
```

```php
// get all historical premium pre-match odds
Sportmonks::football()->odds()->preMatch()->premium()->historical();
```

```php
// get updated historical premium pre-match odds between time range
Sportmonks::football()->odds()->preMatch()->premium()->historicalUpdatedBetweenTime($start, $end);
```

#### Odds inplay

```php
// get all inplay odds
Sportmonks::football()->odds()->inplay()->all();
```

```php
// get inplay odds by fixture id
Sportmonks::football()->odds()->inplay()->byFixture($fixtureId);
```

```php
// get inplay odds by fixture id and bookmaker id
Sportmonks::football()->odds()->inplay()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get inplay odds by fixture id and market id
Sportmonks::football()->odds()->inplay()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get last updated inplay odds
Sportmonks::football()->odds()->inplay()->latest();
```

#### Players

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
// search players by name
Sportmonks::football()->players()->search($name);
```

```php
// get last updated players
Sportmonks::football()->players()->latest();
```

#### Predictions

```php
// get probabilities
Sportmonks::football()->predictions()->probabilities();
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
Sportmonks::football()->predictions()->valueBets();
```

```php
// get value bets by fixture id
Sportmonks::football()->predictions()->valueBetsByFixture($fixtureId);
```

#### Referees

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
// search referees by name
Sportmonks::football()->referees()->search($name);
```

#### Rivals

```php
// get all rivals
Sportmonks::football()->rivals()->all();
```

```php
// get rivals by team id
Sportmonks::football()->rivals()->byTeam($teamId);
```

#### Rounds

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
// search rounds by name
Sportmonks::football()->rounds()->search($name);
```

#### Schedules

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

#### Seasons

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
// search seasons by name
Sportmonks::football()->seasons()->search($name);
```

#### Squads

```php
// get current team squad by team id
Sportmonks::football()->squads()->currentByTeam($teamId); 
```

```php
// get extended team squad by team id
Sportmonks::football()->squads()->extendedByTeam($teamId); 
```

```php
// get team squad by team and season id
Sportmonks::football()->squads()->bySeasonAndTeam($seasonId, $teamId); 
```

#### Stages

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
// search stages by name
Sportmonks::football()->stages()->search($name);
```

#### Standings

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

#### States

```php
// get all states
Sportmonks::football()->states()->all();
```

```php
// get state by id
Sportmonks::football()->states()->find($stateId);
```

#### Statistics

```php
// get statistics by stage id
Sportmonks::football()->statistics()->byStage($stageId);
```

```php
// get statistics by round id
Sportmonks::football()->statistics()->byRound($roundId);
```

```php
// get statistics by player id
Sportmonks::football()->statistics()->byPlayer($playerId);
```

```php
// get statistics by team id
Sportmonks::football()->statistics()->byTeam($teamId);
```

```php
// get statistics by coach id
Sportmonks::football()->statistics()->byCoach($coachId);
```

```php
// get statistics by referee id
Sportmonks::football()->statistics()->byReferee($refereeId);
```

#### Teams

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
// search teams by name
Sportmonks::football()->teams()->search($name);
```

#### TopScorers

```php
// get top-scorers by season id
Sportmonks::football()->topScorers()->bySeason($seasonId);
```

```php
// get top-scorers by stage id
Sportmonks::football()->topScorers()->byStage($stageId);
```

#### Transfers

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
Sportmonks::football()->transfers()->byDateRange($start, $end);
```

```php
// get transfers by team id
Sportmonks::football()->transfers()->byTeam($teamId);
```

```php
// get transfers by player id
Sportmonks::football()->transfers()->byPlayer($playerId);
```

#### TvStations

```php
// get all tv-stations
Sportmonks::football()->tvStations()->all();
```

```php
// get tv-station by id
Sportmonks::football()->tvStations()->find($venueId);
```

```php
// get tv-stations by fixture id
Sportmonks::football()->tvStations()->byFixture($fixtureId);
```

#### Venues

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
// search venues by name
Sportmonks::football()->venues()->search($name);
```

### Odds Api

#### Bookmakers

```php
// get all bookmakers
Sportmonks::odds()->bookmakers()->all();
```

```php
// get all premium bookmakers
Sportmonks::odds()->bookmakers()->premium();
```

```php
// get bookmaker by id
Sportmonks::odds()->bookmakers()->find($bookmakerId);
```

```php
// search bookmakers by name
Sportmonks::odds()->bookmakers()->search($name);
```

```php
// get bookmakers by fixture id
Sportmonks::odds()->bookmakers()->byFixture($bookmakerId);
```

```php
// get bookmaker event id's by fixture id
Sportmonks::odds()->bookmakers()->eventsByFixture($fixtureId);
```

#### Markets

```php
// get all markets
Sportmonks::odds()->markets()->all();
```

```php
// get all premium markets
Sportmonks::odds()->markets()->premium();
```

```php
// get market by id
Sportmonks::odds()->markets()->find($marketId);
```

```php
// search markets by name
Sportmonks::odds()->markets()->search($name);
```

### My Api

```php
// get all filters by entity
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

## Cricket Api

### Basic Usage

#### The `setFields` option

With this option, you can get only fields you are interested in, passing an array of strings, or a comma
separated string.

```php
// returns only `id` and `name` fields
Sportmonks::cricket()->continents()->setFields('id', 'name')->all();
Sportmonks::cricket()->continents()->setFields('id,name')->all();
```

#### The `setFilters` option

With this option, you can filter results by the given fields passing a key-value array:

```php
Sportmonks::cricket()->countries()->setFilters(['name' => 'Spain'])->all();
Sportmonks::cricket()->countries()->setFilters([
    'name' => 'Spain',
    'continent_id' => 1,
])->all();
```

#### The `setInclude` option

With this option, you can enrich your requests including the given relations, passing an array of strings, or a
comma separated string.

```php
Sportmonks::cricket()->leagues()->setInclude('seasons', 'country')->all();
Sportmonks::cricket()->leagues()->setInclude('seasons,country')->all();
```

#### The `sortBy` option

This option allows to sort the response results by the given values, passing an array of string, or a comma separated
string.

```php
Sportmonks::cricket()->seasons()->sortBy('name')->all();
Sportmonks::cricket()->seasons()->sortBy('league_id', 'name')->all();
Sportmonks::cricket()->seasons()->sortBy('league_id,name')->all();
```

### Endpoints

#### Continents

```php
// get all continents
Sportmonks::cricket()->continents()->all();
```

```php
// get continent by id
Sportmonks::cricket()->continents()->find($continentId);
```

#### Countries

```php
// get all countries
Sportmonks::cricket()->countries()->all();
```

```php
// get country by id
Sportmonks::cricket()->countries()->find($countryId);
```

#### Fixtures

```php
// get all fixtures
Sportmonks::cricket()->fixtures()->all();
```

```php
// get fixture by id
Sportmonks::cricket()->fixtures()->find($fixtureId);
```

#### Leagues

```php
// get all leagues
Sportmonks::cricket()->leagues()->all();
```

```php
// get league by id
Sportmonks::cricket()->leagues()->find($leagueId);
```

#### Livescores

```php
// get all livescores
Sportmonks::cricket()->livescores()->all();
```

#### Officials

```php
// get all officials
Sportmonks::cricket()->officials()->all();
```

```php
// get official by id
Sportmonks::cricket()->officials()->find($officialId);
```

#### Players

```php
// get all players
Sportmonks::cricket()->players()->all();
```

```php
// get player by id
Sportmonks::cricket()->players()->find($leagueId);
```

#### Positions

```php
// get all positions
Sportmonks::cricket()->positions()->all();
```

```php
// get position by id
Sportmonks::cricket()->positions()->find($positionId);
```

#### Scores

```php
// get all scores
Sportmonks::cricket()->scores()->all();
```

```php
// get score by id
Sportmonks::cricket()->scores()->find($scoreId);
```

#### Seasons

```php
// get all seasons
Sportmonks::cricket()->seasons()->all();
```

```php
// get season by id
Sportmonks::cricket()->seasons()->find($seasonId);
```

#### Squads

```php
// get squad by team and season id
Sportmonks::cricket()->squads()->byTeamAndSeason($teamId, $seasonId);
```

#### Stages

```php
// get all stages
Sportmonks::cricket()->stages()->all();
```

```php
// get stage by id
Sportmonks::cricket()->stages()->find($stageId);
```

#### Standings

```php
// get standings by season id
Sportmonks::cricket()->standings()->bySeason($seasonId);
```

```php
// get standings by stage id
Sportmonks::cricket()->standings()->byStage($stageId);
```

#### TeamRankings

```php
// get global team seasons
Sportmonks::cricket()->teamRankings()->global();
```

#### Teams

```php
// get all teams
Sportmonks::cricket()->teams()->all();
```

```php
// get team by id
Sportmonks::cricket()->teams()->find($teamId);
```

#### Venues

```php
// get all venues
Sportmonks::cricket()->venues()->all();
```

```php
// get venue by id
Sportmonks::cricket()->venues()->find($venueId);
```

## FormulaOne Api

### Basic Usage

TODO: filters, include, sort

### Endpoints

#### Drivers

```php
// get driver by id
Sportmonks::f1()->drivers()->find($driverId);
```

```php
// get drivers by season id
Sportmonks::f1()->drivers()->bySeason($seasonId);
```

```php
// get season race results
Sportmonks::f1()->drivers()->seasonResults($driverId, $seasonId);
```

#### Livescores

```php
// get livescores
Sportmonks::f1()->livescores()->all();
```

#### Seasons

```php
// get seasons
Sportmonks::f1()->seasons()->all();
```

```php
// get season by id
Sportmonks::f1()->seasons()->find($seasonId);
```

#### Stages

```php
// get stages
Sportmonks::f1()->stages()->all();
```

```php
// get stage by id
Sportmonks::f1()->stages()->find($stageId);
```

```php
// get stage by season id
Sportmonks::f1()->stages()->bySeason($seasonId);
```

#### Teams

```php
// get team by id
Sportmonks::f1()->teams()->find($teamId);
```

```php
// get teams by season id
Sportmonks::f1()->teams()->bySeason($seasonId);
```

```php
// get season race results
Sportmonks::f1()->teams()->seasonResults($teamId, $seasonId);
```

#### Tracks

```php
// get all tracks
Sportmonks::f1()->tracks()->all();
```

```php
// get track by id
Sportmonks::f1()->tracks()->find($trackId);
```

```php
// get tracks by season id
Sportmonks::f1()->tracks()->bySeason($seasonId);
```

#### Winners

```php
// get track winners by season id
Sportmonks::f1()->winners()->bySeason();
```
