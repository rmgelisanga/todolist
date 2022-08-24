import { TestBed } from '@angular/core/testing';

import { DbHelperService } from './db-helper.service';

describe('DbHelperService', () => {
  let service: DbHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DbHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
