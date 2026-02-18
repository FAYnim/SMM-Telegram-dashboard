# Campaign Module Update Plan

Based on Git commit `885d43bf0ea8ff4dea39fac867da572b23d0922f` (withdrawals module), implementing similar dynamic loading for campaigns module.

## Changes Required

### 1. SQL - `data/smm_campaigns.sql`
- Add `platform` column (enum: instagram, tiktok, youtube, twitter, facebook)
- Update sample data to include platform values

### 2. API - Create `src/api/get-campaigns.php`
- Fetch campaigns with JOIN to smm_users to get client username
- Return total campaigns count
- Return counts by status (draft, active, paused, completed)

### 3. JavaScript - Update `src/js/campaigns.js`
- Add `getCampaigns()` function to fetch from API
- Dynamic table population with platform display
- Event handlers for approve/reject/pause/resume buttons

### 4. PHP - Update `campaigns.php`
- Remove hardcoded table rows
- Add dynamic IDs for tbody
- Add loading spinner
- Add dynamic counters (total, draft count)
- Update modals to use dynamic data via data attributes
