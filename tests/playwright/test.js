const { test, expect } = require('@playwright/test');

test.describe('1 page multiple tests', () => {
  let page;
  test.beforeAll(async ({ browser }) => {
      const context = await browser.newContext();
      page = await context.newPage();
  });

  test.afterAll(async ({ browser }) => {
      browser.close;
  });

  test('navigate to correct pages', async ({ page }) => {
    await page.goto('http://localhost:4000');
    //check we're on the index
    const titleIsVisible = page.locator('text=Choose your mode');
    await expect(titleIsVisible).toBeVisible();
  
    //go to main page
    await page.click('text=Regular Mode');
    await expect(page).toHaveURL(/.*mainpage.php/);
  
    //go to settings
    await page.click('id=settings');
    await expect(page).toHaveURL(/.*settings.php/);
  
    //go back to index page from the settings page
    await page.click('id=change_mode_btn');
    await expect(page).toHaveURL(/.*index.php/);
  
    //go to main page with different mode
    await page.click('text=Celebrity Mode');
    await expect(page).toHaveURL(/.*mainpage.php/);
  
    //go to leaderboard
    await page.click('id=leaderboard');
    await expect(page).toHaveURL(/.*leaderboard.php/);
  
    //go to mainpage using the back button
    await page.click('id=back_lderbrd');
    await expect(page).toHaveURL(/.*mainpage.php/);
  
    //go to instructions page
    await page.click('id=questions');;
    await expect(page).toHaveURL(/.*instructions.php/);
  });
  test('settings test', async ({ page }) => {
    //select regular mode
    await page.goto('http://localhost:4000');
    await page.click('text= Regular Mode');
  
    //go to settings
    await page.click('id=settings');
    const changeMode = page.locator('id=change_mode_btn');
    await expect(changeMode).toBeVisible();
    const apply = page.locator('id=apply');
    await expect(apply).toBeHidden();
  
    //select any different mode
    await page.click('id=change_mode_btn');
    await expect(page).toHaveURL(/.*index.php/);
    await page.click('text=Random Mode');
  
    //go to settings
    await page.click('id=settings');
    await expect(changeMode).toBeVisible();
    await expect(apply).toBeVisible();
  
    const timer = page.locator('id=timer');
    await expect(timer).toBeHidden();
    const tries = page.locator('id=tries');
    await expect(tries).toBeHidden();
  
    //timer toggle
    await page.click('id=whole_timer');
    await page.click('id=apply');
  
    await expect(timer).toBeVisible();
    await expect(tries).toBeHidden();
  
    //tries toggle
    await page.click('id=settings');
    await page.click('id=whole_tries');
    await page.click('id=apply');
    
    await expect(timer).toBeVisible();
    await expect(tries).toBeVisible();
  }); 

});

