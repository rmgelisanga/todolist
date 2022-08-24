import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, debounceTime, Observable, of } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class DbHelperService {
  constructor(private http: HttpClient) {}

  get(url: string, debounceInterval: number = 0): Observable<any> {
    return this.http.get<any>(url).pipe(
      debounceTime(debounceInterval),
      catchError(
        this.handleError<any>('get', {
          message: 'Failed to fetch.',
          data: [],
        })
      )
    );
  }

  private handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
      console.error(`${operation.toUpperCase()} Failed:`, error);
      return of(result as T);
    };
  }
}
